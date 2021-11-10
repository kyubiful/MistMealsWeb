<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Objetivo;
use App\Models\User;
use App\Models\AvailableCP;
use App\Models\Plato;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {
        $objetivo = Objetivo::all();
        $availableCP = AvailableCP::select('cp')->pluck('cp')->toArray();
        $platos = Plato::all();

        if (auth()->check()) {
            $user = User::findOrFail(auth()->user()->id);
            if (in_array($user->cp, $availableCP)) {
                // $cookie = Cookie::make('popupCp', 3, 7 * 24 * 60);
                return view('web.home.index', compact('objetivo','platos'));
                // return response(view('web.home.index', compact('objetivo')))->cookie($cookie);
            } else {
                // Cookie::queue(Cookie::make('popupCp', 1, 7 * 24 * 60));
                return view('web.home.index', compact('objetivo','platos'))->with('popupCp', 1);
                // return view('web.home.index', compact('objetivo'));
            }
        }
        //Cookie::queue(Cookie::make('popupCp', 1, 7 * 24 * 60));
        return view('web.home.index', compact('objetivo','platos'))->with('popupCp', 1);
        // return view('web.home.index', compact('objetivo'));
    }

    public function endHomePopup()
    {
        $cookie = Cookie::make('popupCpEnd', 'true', 7 * 24 * 60);
        return redirect()->back()->cookie($cookie);
    }

    public function getDeliveryDay(Request $request){

        $availableCP = AvailableCP::select('cp')->pluck('cp')->toArray();
        $cp = $request->cp;
        $nextThursday = new Carbon('Next Thursday');
        $today = Carbon::now();

        $todayNumber = (int)$today->format('d');
        $nextThursdatNumber = (int)$nextThursday->format('d');

        if(in_array($cp, $availableCP)){
            if(($nextThursdatNumber - $todayNumber) <= 4){
                $nextDelivery = $nextThursday->addWeeks(1)->formatLocalized('%A %d de %B');
                $message = "El pedido te llegará el ".$nextDelivery;
                return response()->json([
                    'status' => 500,
                    'message' => $message
                ]);
            } else {
                $nextDelivery = $nextThursday->format('%A %d de %B');
                $message = "El pedido te llegará el ".$nextDelivery;
                return response()->json([
                    'status' => 500,
                    'message' => $message
                ]);
            }
        } else {
            $message = "Vaya! Hasta ahí de momento no llegamos, si quieres puedes registrarte y te avisaremos por email cuando estemos por allí ;)";
            return response()->json([
                'status' => 500,
                'message' => $message
            ]);
        }


    }
}
