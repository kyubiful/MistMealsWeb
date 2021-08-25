<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ssheduardo\Redsys\Facades\Redsys;
use Exception;
use App\Services\CartService;
use App\Models\User;
use GuzzleHttp\Client;

class RedsysController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public static function index($amount)
    {

        try {
            $key = config('redsys.key');
            $merchantcode = config('redsys.merchantcode');

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
            Redsys::setTitular('MistMeals');
            Redsys::setProductDescription('Platos MistMeals');
            Redsys::setEnviroment('test'); //Entorno test

            $signature = Redsys::generateMerchantSignature($key);
            Redsys::setMerchantSignature($signature);

            $form = Redsys::createForm();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $form;
    }

    public function comprobar(Request $request)
    {
        try {
            $key = config('redsys.key');
            $parameters = Redsys::getMerchantParameters($request->input('Ds_MerchantParameters'));
            $DsResponse = $parameters['Ds_Response'];
            $DsResponse += 0;
            if (Redsys::check($key, $request->input()) && $DsResponse <= 99) {

                $user = User::findOrFail(auth()->user()->id);
                $cart = $this->cartService->getFromCookie();
                $client = new Client();
                $salesorderURL = 'https://api.holded.com/api/invoicing/v1/documents/salesorder';
                $invoiceURL = 'https://api.holded.com/api/invoicing/v1/documents/invoice';
                $payedURL = 'https://api.holded.com/api/invoicing/v1/documents/invoice/';



                $items = array();

                for ($i = 0; $i < $cart->products->count(); $i++) {
                    $product = $cart->products[$i];
                    $item = array(
                        'name' => $product->nombre,
                        'units' => $product->pivot->quantity,
                        'subtotal' => $product->precio / 1.21,
                        'tax' => 21
                    );

                    array_push($items, $item);
                };

                $holdedArray = array(
                    'contactCode' => $user->id + 10,
                    'contactName' => $user->name,
                    'contactEmail' => $user->email,
                    'contactAddress' => $user->address,
                    'contactCity' => $user->city,
                    'contactCp' => $user->cp,
                    'date' => time(),
                    'items' => '',
                    'applyContactDefaults' => False
                );

                $holdedArray['items'] = $items;

                $holdedArray = json_encode($holdedArray);
                $client->post($salesorderURL, ['headers' => ['key' => env('HOLDED_API_KEY_TEST')], 'body' => $holdedArray]);
                $res = $client->post($invoiceURL, ['headers' => ['key' => env('HOLDED_API_KEY_TEST')], 'body' => $holdedArray]);
                $res = json_decode($res->getBody()->getContents());
                $invoiceId = $res->id;
                $payJSON = json_encode(['date' => time(), 'amount' => $cart->total]);
                $client->post($payedURL . $invoiceId . '/pay', ['headers' => ['key' => env('HOLDED_API_KEY_TEST')], 'body' => $payJSON]);

                $this->cartService->deleteCookie();
                return redirect('/')->with('message', 'success');
            } else {
                return redirect('/')->with('message', 'error');
            }
        } catch (Exception $e) {
            return redirect()->withErrors($e);
        }
    }
}
