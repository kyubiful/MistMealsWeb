<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AvailableCP;
use App\Models\Objetivo;
use Illuminate\Support\Facades\Cookie;

class AvailableCPController extends Controller
{
  public function verifyCP(Request $request)
  {
    $availableCP = AvailableCP::select('cp')->pluck('cp')->toArray();
    $cp = strval($request->cp);
    $objetivo = Objetivo::all();

    if (in_array($cp, $availableCP)) {
      // $cp_cookie = Cookie::make('popupCp', 2, 7 * 24 * 60);
      // $cp_cookie_result = Cookie::make('cp_result', true, 7 * 24 * 60);
      return redirect()->back()->with('popupCp2', 2)->withoutCookie('popupCpEnd');
      //return redirect()->back()->with('popupCp', 2);
    } else {
      // $cp_cookie = Cookie::make('popupCp', 3, 7 * 24 * 60);
      // $cp_cookie_result = Cookie::make('cp_result', false, 7 * 24 * 60);
      return redirect()->back()->with('popupCp2', 3)->withoutCookie('popupCpEnd');
      // return redirect()->back()->with('popupCp', 3);
    }
  }
}
