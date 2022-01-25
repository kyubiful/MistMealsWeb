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
use App\Models\AvailableCP;
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
	}

	public static function index($user, $amount)
	{
		try {

			$key = config('redsys.key');
			$merchantcode = config('redsys.merchantcode');
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

		// Inicialización de variables

		if(auth()->user()) {
			$user = User::findOrFail(auth()->user()->id);
			$email = $user->email;
		} else {
			$user = User::findOrFail(session('userid'));
			$email = session('email');
		}

		$cart = $this->cartService->getFromCookie();
		$client = new Client();
		$salesorderURL = 'https://api.holded.com/api/invoicing/v1/documents/salesorder';
		$invoiceURL = 'https://api.holded.com/api/invoicing/v1/documents/invoice';
		$payedURL = 'https://api.holded.com/api/invoicing/v1/documents/invoice/';
		$createContactURL = 'https://api.holded.com/api/invoicing/v1/contacts';
		$descuentoName = $request->cookie('descuento_name');
		$discountCode = DiscountCode::where('name', $descuentoName)->first();
    $shippingAmount = AvailableCP::select('amount')->where('cp', $user->cp)->first()->amount;
		$discount = 0;
		$freeShipping = $request->session()->get('free_shipping');
    $shippingAmount = AvailableCP::select('amount')->where('cp', $user->cp)->first()->amount;

		if ($request->cookie('descuento') != null) {
			if($discountCode->tipo != 'fijo') {
				$discount = (int)$request->cookie('descuento');
			}
		}

		$items = array();
		$amount = 0;

		// Añadir productos al array de items para enviarlo a holded

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

		$shippingAmountItem = array(
				'name' => 'Gastos de envío',
				'units' => 1,
				'subtotal' => round(($shippingAmount / 1.21), 2),
				'tax' => 21,
		);

		array_push($items, $shippingAmountItem);

		if($discountCode != null AND $discountCode->tipo == 'fijo') {
			$discountItem = array(
				'name' => 'descuento',
				'units' => 1,
				'subtotal' => -round(((int)$request->cookie('descuento')),2),
			);
			array_push($items, $discountItem);
		}

		if($freeShipping != false OR $freeShipping != null) {
			$freeShippingItem = array(
				'name' => 'Gastos de envío gratis',
				'units' => 1,
				'subtotal' =>  -round(($shippingAmount / 1.21), 2),
				'tax' => 21,
			);
			array_push($items, $freeShippingItem);
		}

		// Creamos un array con los datos del pedido para holded

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

		// Creamos un array con los datos del cliente para holded

		$holdedClient = array(
			'name' => $user->name . ' ' . $user->surname,
			'email' => $email,
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

		// Creación de cliente en holded

		try {
			$res = $client->post($createContactURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedClient]);
			$res = json_decode($res->getBody()->getContents());
			$user->holded_id = $res->id;
			$user->save();
		} catch (Exception $e) {
			dd('Error a la hora de crear el usuario');
		}

		// Añadimos los items al array que se enviará a holded y lo encodeamos

		$holdedArray['items'] = $items;
		$holdedArray = json_encode($holdedArray);

		// Creación del pedido en holded

		try {
			$client->post($salesorderURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
		} catch (Exception $e) {
			dd('Error a la hora de crear el pedido');
		}

		// Creación de la factura en holded

		try {
			$res = $client->post($invoiceURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
		} catch (Exception $e) {
			dd('Error a la hora de crear la factura');
		}

		// Dejamos la factura creada como pagada

		$res = json_decode($res->getBody()->getContents());
		$invoiceId = $res->id;
		$payJSON = json_encode(['date' => time(), 'amount' => $cart->total]);

		try {
			$client->post($payedURL . $invoiceId . '/pay', ['headers' => ['key' => config('holded.key')], 'body' => $payJSON]);
		} catch (Exception $e) {
			dd('Error a la hora de poner el pedido como pagado');
		}

		// Envio del mail de confirmación del pedido

		try {
			Mail::to($email)->send(new OrderMail($cart, null));
		} catch (\Exception $e) {
			dd('Error a la hora de enviar el correo de confirmación del pedido');
			return response()->json(array(
				'status' => 500,
				'message' => $e->getMessage()
			));
		}

		// Creamos un payment en nuestra base de datos

		$order_id = (int)$request->cookie('order_id');

		$payment = new Payment(array(
			'amount' => $amount,
			'payed_at' => time(),
			'order_id' => $order_id
		));

		$payment->save();

		// Asociarmos el código de descuento al usuario si el código es único por usuario

		if ($discountCode->unique == 1)
		{
			$user->discountCodes()->attach($discountCode->id);
		}
		$discountCode->uses = $discountCode->uses + 1;
		$discountCode->save();

		// Cambiamos el order a pagado

		Order::whereId($order_id)->update(['status' => 'pagado']);

		// Borramos todas las cookies y las variables de sesión que hemos necesitado y redirijimos a la home

		session(['free_shipping' => false]);
		$this->cartService->deleteCookie();
		$request->session()->forget(['user', 'email']);
		return redirect('/thanks')->with('message', 'success')->withoutCookie('order_id')->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
	}

	public function comprobar(Request $request)
	{

		try {

			$key = config('redsys.key');
			$parameters = Redsys::getMerchantParameters($request->input('Ds_MerchantParameters'));
			$DsResponse = $parameters['Ds_Response'];
			$DsResponse += 0;

			// Si la respuesta de redsys es positiva

			if (Redsys::check($key, $request->input()) && $DsResponse <= 99) {

				// Inicializamos las variables

				$descuentoName = $request->cookie('descuento_name');
				$discountCode = DiscountCode::where('name', $descuentoName)->first();

				if(auth()->user()) {
					$user = User::findOrFail(auth()->user()->id);
					$email = $user->email;
				} else {
					$user = User::findOrFail(session('userid'));
					$email = session('email');
				}

				$shippingAmount = AvailableCP::select('amount')->where('cp', $user->cp)->first()->amount;
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
				$freeShipping = $request->session()->get('free_shipping');
				$shippingAmount = AvailableCP::select('amount')->where('cp', $user->cp)->first()->amount;

				if ($request->cookie('descuento') != null AND $discountCode->tipo != 'fijo') {
					$discount = (int)$request->cookie('descuento');
				}

				$items = array();
				$amount = 0;

				// Añadimos todos los productos al array de items

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

				$shippingAmountItem = array(
						'name' => 'Gastos de envío',
						'units' => 1,
						'subtotal' => round(($shippingAmount / 1.21), 2),
						'tax' => 21,
				);

				array_push($items, $shippingAmountItem);

				if($discountCode != null AND $discountCode->tipo == 'fijo') {
					$discountItem = array(
						'name' => 'Descuento '.$discountCode->name,
						'units' => 1,
						'subtotal' => -round(((int)$request->cookie('descuento')),2),
					);
					array_push($items, $discountItem);
				}

				if($freeShipping != false OR $freeShipping != null) {
					$freeShippingItem = array(
						'name' => 'Gastos de envío gratis',
						'units' => 1,
						'subtotal' =>  -round(($shippingAmount / 1.21), 2),
						'tax' => 21,
					);
					array_push($items, $freeShippingItem);
				}

				// Creamos un array con los datos del pedido para holded

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

				// Creamos un array con los datos del usuario para holded

				$holdedClient = array(
					'name' => $user->name . ' ' . $user->surname,
					'email' => $email,
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

				// Creación de usuario en holded

				$holdedClient = json_encode($holdedClient);

				try {
					$res = $client->post($createContactURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedClient]);
					$res = json_decode($res->getBody()->getContents());
					$user->holded_id = $res->id;
					$user->save();
				} catch (Exception $e) {
					dd('Error a la hora de crear el usuario');
				}

				// Creación de pedido en holded

				$holdedArray['items'] = $items;
				$holdedArray = json_encode($holdedArray);

				try {
					$client->post($salesorderURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
				} catch (Exception $e) {
					dd('Error a la hora de crear el pedido');
				}

				// Creación de factura en holded

				try {
					$res = $client->post($invoiceURL, ['headers' => ['key' => config('holded.key')], 'body' => $holdedArray]);
				} catch (Exception $e) {
					dd('Error a la hora de crear la factura');
				}

				// Ponemos el pedido como pagado en holded

				$res = json_decode($res->getBody()->getContents());
				$invoiceId = $res->id;
				$payJSON = json_encode(['date' => time(), 'amount' => $cart->total]);

				try {
					$client->post($payedURL . $invoiceId . '/pay', ['headers' => ['key' => config('holded.key')], 'body' => $payJSON]);
				} catch (Exception $e) {
					dd('Error a la hora de poner el pedido como pagado');
				}

				// Enviamos correo de confirmación

				try {
					Mail::to($email)->send(new OrderMail($cart, null));
				} catch (\Exception $e) {
					dd('Error a la hora de enviar el correo de confirmación del pedido', $e);
					return response()->json(array(
						'status' => 500,
						'message' => $e->getMessage()
					));
				}

				// Creamos un payment en nuestra base de datos

				$order_id = (int)$request->cookie('order_id');

				$payment = new Payment(array(
					'amount' => $amount,
					'payed_at' => time(),
					'order_id' => $order_id
				));

				$payment->save();

				// Asociamos el código de descuento al usuario si es de tipo único

				if ($discountCode!=null) {
					if($discountCode->unique == 1){
						$user->discountCodes()->attach($discountCode->id);
					}
					$discountCode->uses = $discountCode->uses + 1;
					$discountCode->save();
				}

				// Ponemos el order como pagado en nuestra base de datos

				Order::whereId($order_id)->update(['status' => 'pagado']);

				// Borramos todas las cookies y variables de sesión que necesitabamos y devolvemos al usuario a la home

				session(['free_shpping' => false]);
				$this->cartService->deleteCookie();
				$request->session()->forget(['user', 'email']);
				return redirect('/thanks')->with('message', 'success')->withoutCookie('order_id')->withoutCookie('descuento')->withoutCookie('descuento_name')->withoutCookie('descuento_type');
			} else {

				// Si redsys responde con un código de error

				return redirect('/')->with('message', 'error');
			}
		} catch (Exception $e) {

			// Si hay algún problema a la hora de tener contacto con redsys

			dd('Error fuera del try principal', $e);
			return redirect('/')->with('message', 'error');
		}
	}
}
