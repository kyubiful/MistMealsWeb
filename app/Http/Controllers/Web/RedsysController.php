<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\DiscountCode;
use App\Models\Order;
use Ssheduardo\Redsys\Facades\Redsys;
use Exception;
use App\Services\CartService;
use App\Models\User;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade as PDF;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RedsysController extends Controller
{

	public $cartService;

	public function __construct(CartService $cartService)
	{
		$this->cartService = $cartService;
		$this->middleware('user.auth');
	}

	public static function index($amount)
	{
		try {

			$key = config('redsys.key');
			$merchantcode = config('redsys.merchantcode');
			$user = User::findOrFail(auth()->user()->id);
			$titular = $user->name . ' ' . $user->surname;

			Redsys::setAmount($amount);
			Redsys::setOrder(time());
			Redsys::setMerchantcode($merchantcode); //Reemplazar por el código que proporciona el banco
			Redsys::setCurrency('978');
			Redsys::setTransactiontype('0');
			Redsys::setTerminal('1');
			Redsys::setMethod('T'); //Solo pago con tarjeta, no mostramos iupay
			Redsys::setNotification(config('redsys.url_notification')); //Url de notificacion
			Redsys::setUrlOk(config('redsys.url_ok')); //Url OK
			Redsys::setUrlKo(config('redsys.url_ko')); //Url KO
			Redsys::setVersion('HMAC_SHA256_V1');
			Redsys::setTradeName('Mist Meals S.L.');
			Redsys::setTitular($titular);
			Redsys::setProductDescription('Platos MistMeals');
			Redsys::setEnviroment(config('redsys.enviroment')); //Entorno test

			$signature = Redsys::generateMerchantSignature($key);
			Redsys::setMerchantSignature($signature);

			$form = Redsys::createForm();
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return $form;
	}

	public function free(Request $request)
	{
		$user = User::findOrFail(auth()->user()->id);
		$cart = $this->cartService->getFromCookie();
		$client = new Client();
		$salesorderURL = 'https://api.holded.com/api/invoicing/v1/documents/salesorder';
		$invoiceURL = 'https://api.holded.com/api/invoicing/v1/documents/invoice';
		$payedURL = 'https://api.holded.com/api/invoicing/v1/documents/invoice/';
		$createContactURL = 'https://api.holded.com/api/invoicing/v1/contacts';
		$descuentoName = $request->cookie('descuento_name');
		$discountCode = DiscountCode::where('name', $descuentoName)->first();
		$discount = 0;

		if ($request->cookie('descuento') != null) {
			$discount = (int)$request->cookie('descuento');
		}

		$items = array();
		$amount = 0;

		for ($i = 0; $i < $cart->products->count(); $i++) {
			$product = $cart->products[$i];
			$item = array(
				'name' => $product->nombre . '-' . $product->plato_peso->valor,
				'units' => $product->pivot->quantity,
				'subtotal' => round(($product->precio / 1.10), 2),
				'tax' => 10,
				'discount' => $discount
			);

			array_push($items, $item);
			$amount = $amount + ($product->precio * $product->pivot->quantity);
		};

		$holdedArray = array(
			'contactCode' => $user->id + 10,
			'shippingAddress' => $user->address . ' ' . $user->address_number . ' ' . $user->address_letter,
			'shippingCity' => $user->city,
			'shippingPostalCode' => $user->cp,
			'shippingProvince' => $user->province,
			'notes' => 'Telefono de contacto: ' . $user->phone,
			'date' => time(),
			'items' => '',
			'applyContactDefaults' => False
		);

		$holdedClient = array(
			'name' => $user->name . ' ' . $user->surname,
			'email' => $user->email,
			'type' => 'client',
			'isperson' => 'true',
			'code' => $user->id + 10,
			'billAddress' => array(
				'address' => $user->invoice_address . ' ' . $user->invoice_address_number . ' ' . $user->invoice_address_letter,
				'city' => $user->invoice_city,
				'postalCode' => $user->invoice_cp,
				'province' => $user->invoice_province,
			)
		);

		$holdedClient = json_encode($holdedClient);

		try {
			$res = $client->post($createContactURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedClient]);
			$res = json_decode($res->getBody()->getContents());
			$user->holded_id = $res->id;
			$user->save();
		} catch (Exception $e) {
			dd('Error a la hora de crear el usuario');
		}

		$holdedArray['items'] = $items;
		$holdedArray = json_encode($holdedArray);

		try {
			$client->post($salesorderURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
		} catch (Exception $e) {
			dd('Error a la hora de crear el pedido');
		}

		try {
			$res = $client->post($invoiceURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
		} catch (Exception $e) {
			dd('Error a la hora de crear la factura');
		}

		$res = json_decode($res->getBody()->getContents());
		$invoiceId = $res->id;
		$payJSON = json_encode(['date' => time(), 'amount' => $cart->total]);

		try {
			$client->post($payedURL . $invoiceId . '/pay', ['headers' => ['key' => config('holded.key')], 'body' => $payJSON]);
		} catch (Exception $e) {
			dd('Error a la hora de poner el pedido como pagado');
		}

		try {
			Mail::to($user->email)->send(new OrderMail($cart, null));
		} catch (\Exception $e) {
			dd('Error a la hora de enviar el correo de confirmación del pedido');
			return response()->json(array(
				'status' => 500,
				'message' => $e->getMessage()
			));
		}

		$order_id = (int)$request->cookie('order_id');

		$payment = new Payment(array(
			'amount' => $amount,
			'payed_at' => time(),
			'order_id' => $order_id
		));

		$payment->save();

		if ($discountCode->unique == 1) 
		{
			$user->discountCodes()->attach($discountCode->id);
		}
		$discountCode->uses = $discountCode->uses + 1;
		$discountCode->save();

		Order::whereId($order_id)->update(['status' => 'pagado']);

		$this->cartService->deleteCookie();
		return redirect('/')->with('message', 'success')->withoutCookie('order_id')->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
	}

	public function comprobar(Request $request)
	{

		try {
			$key = config('redsys.key');
			$parameters = Redsys::getMerchantParameters($request->input('Ds_MerchantParameters'));
			$DsResponse = $parameters['Ds_Response'];
			$DsResponse += 0;
			if (Redsys::check($key, $request->input()) && $DsResponse <= 99) {

				$descuentoName = $request->cookie('descuento_name');
				$discountCode = DiscountCode::where('name', $descuentoName)->first();

				$user = User::findOrFail(auth()->user()->id);
				$cart = $this->cartService->getFromCookie();
				// $order = Order::findOrFail($request->cookie('order_id'));
				$client = new Client();
				$salesorderURL = 'https://api.holded.com/api/invoicing/v1/documents/salesorder';
				$invoiceURL = 'https://api.holded.com/api/invoicing/v1/documents/invoice';
				$payedURL = 'https://api.holded.com/api/invoicing/v1/documents/invoice/';
				// $getPdfUrl = 'https://api.holded.com/api/invoicing/v1/documents/invoice/';
				// $updateContactURL = 'https://api.holded.com/api/invoicing/v1/contacts/';
				$createContactURL = 'https://api.holded.com/api/invoicing/v1/contacts';
				$discount = 0;
				if ($request->cookie('descuento') != null) {
					$discount = (int)$request->cookie('descuento');
				}

				$items = array();
				$amount = 0;

				for ($i = 0; $i < $cart->products->count(); $i++) {
					$product = $cart->products[$i];
					$item = array(
						'name' => $product->nombre . '-' . $product->plato_peso->valor,
						'units' => $product->pivot->quantity,
						'subtotal' => round(($product->precio / 1.10), 2),
						'tax' => 10,
						'discount' => $discount
					);

					array_push($items, $item);
					$amount = $amount + ($product->precio * $product->pivot->quantity);
				};

				// if($order->invoice == 1){
				//     $holdedInvoiceArray = array(
				//         'contactCode' => $user->invoice_nif,
				//         'contactName' => $user->name,
				//         'contactEmail' => $user->email,
				//         'contactAddress' => $user->invoice_address,
				//         'contactCity' => $user->invoice_city,
				//         'contactCp' => $user->invoice_cp,
				//         'notes' => 'Telefono de contacto: '.$user->phone,
				//         'date' => time(),
				//         'items' => '',
				//         'applyContactDefaults' => False
				//     );

				//     $holdedArray = array(
				//         'contactCode' => $user->id + 10,
				//         'contactName' => $user->name,
				//         'contactEmail' => $user->email,
				//         'contactAddress' => $user->address,
				//         'contactCity' => $user->city,
				//         'contactCp' => $user->cp,
				//         'notes' => 'Telefono de contacto: '.$user->phone,
				//         'date' => time(),
				//         'items' => '',
				//         'applyContactDefaults' => False
				//     );
				//     $holdedArray['items'] = $items;
				//     $holdedInvoiceArray['items'] = $items;

				//     $holdedArray = json_encode($holdedArray);
				//     $holdedInvoiceArray = json_encode($holdedInvoiceArray);

				//     $client->post($salesorderURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
				//     $res = $client->post($invoiceURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedInvoiceArray]);
				//     $res = json_decode($res->getBody()->getContents());
				//     $invoiceId = $res->id;
				//     $payJSON = json_encode(['date' => time(), 'amount' => $cart->total]);
				//     $client->post($payedURL . $invoiceId . '/pay', ['headers' => ['key' => config('holded.key')], 'body' => $payJSON]);
				//     $pdf = $client->get($getPdfUrl.$invoiceId.'/pdf', ['headers' => ['key' => config('holded.key')]]);
				//     dd($pdf->getBody()->getContents());
				//     $res2 = $pdf->getBody()->getContents();

				//     $invoicePdf = PDF::loadHTML($res2)->setPaper('a4', 'landscape');

				//     try {
				//         Mail::to(auth()->user()->email)->send(new OrderMail($cart, $invoicePdf));
				//     } catch (\Exception $e) {
				//         return response()->json(array(
				//             'status' => 500,
				//             'message' => $e->getMessage()
				//         ));
				//     }
				// } else {

				$holdedArray = array(
					'contactCode' => $user->id + 10,
					'shippingAddress' => $user->address . ' ' . $user->address_number . ' ' . $user->address_letter,
					'shippingCity' => $user->city,
					'shippingPostalCode' => $user->cp,
					'shippingProvince' => $user->province,
					'notes' => 'Telefono de contacto: ' . $user->phone,
					'date' => time(),
					'items' => '',
					'applyContactDefaults' => False
				);

				$holdedClient = array(
					'name' => $user->name . ' ' . $user->surname,
					'email' => $user->email,
					'type' => 'client',
					'isperson' => 'true',
					'code' => $user->id + 10,
					'billAddress' => array(
						'address' => $user->invoice_address . ' ' . $user->invoice_address_number . ' ' . $user->invoice_address_letter,
						'city' => $user->invoice_city,
						'postalCode' => $user->invoice_cp,
						'province' => $user->invoice_province,
					)
				);

				$holdedClient = json_encode($holdedClient);
				// $res = $client->post($createContactURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedClient]);
				// $res = json_decode($res->getBody()->getContents());
				// dd($res->id, $user);


				// if($user->holded_id == null){
				try {
					$res = $client->post($createContactURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedClient]);
					$res = json_decode($res->getBody()->getContents());
					$user->holded_id = $res->id;
					$user->save();
				} catch (Exception $e) {
					dd('Error a la hora de crear el usuario');
				}
				// }elseif($user->holded_id != null){
				//	$client->put($updateContactURL.$user->holded_id, ['headers' => ['key' => config('holded.key'), 'Accept' => 'application/json', 'Content-Type' => 'application/json'], 'body' => $holdedClient]);
				//}

				$holdedArray['items'] = $items;
				$holdedArray = json_encode($holdedArray);

				try {
					$client->post($salesorderURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
				} catch (Exception $e) {
					dd('Error a la hora de crear el pedido');
				}

				try {
					$res = $client->post($invoiceURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
				} catch (Exception $e) {
					dd('Error a la hora de crear la factura');
				}

				$res = json_decode($res->getBody()->getContents());
				$invoiceId = $res->id;
				$payJSON = json_encode(['date' => time(), 'amount' => $cart->total]);

				try {
					$client->post($payedURL . $invoiceId . '/pay', ['headers' => ['key' => config('holded.key')], 'body' => $payJSON]);
				} catch (Exception $e) {
					dd('Error a la hora de poner el pedido como pagado');
				}

				try {
					Mail::to($user->email)->send(new OrderMail($cart, null));
				} catch (\Exception $e) {
					dd('Error a la hora de enviar el correo de confirmación del pedido');
					return response()->json(array(
						'status' => 500,
						'message' => $e->getMessage()
					));
				}

				// }

				$order_id = (int)$request->cookie('order_id');

				$payment = new Payment(array(
					'amount' => $amount,
					'payed_at' => time(),
					'order_id' => $order_id
				));

				$payment->save();

				if ($discountCode->unique == 1) {
					$user->discountCodes()->attach($discountCode->id);
				}
				$discountCode->uses = $discountCode->uses + 1;
				$discountCode->save();

				Order::whereId($order_id)->update(['status' => 'pagado']);

				$this->cartService->deleteCookie();
				return redirect('/')->with('message', 'success')->withoutCookie('order_id')->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
			} else {
				return redirect('/')->with('message', 'error');
			}
		} catch (Exception $e) {
			dd('Error fuera del try principal', $e);
			return redirect('/')->with('message', 'error');
		}
	}
}
