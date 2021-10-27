<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Newsletter\NewsletterFacade as Newsletter;
use App\Mail\NewsletterMail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class MailChimpController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->email;
        Newsletter::subscribeOrUpdate($email);

        try{
            Mail::to($request->email)->send(new NewsletterMail($request));
        } catch (\Exception $e) {
            $t = response()->json(array(
                'status' => 500,
                'message' => 'Error!'
            ));
        }

        $t = response()->json(array(
            'status' => 200,
            'message' => 'Enviado'
        ));

        $cookie = Cookie::make('newsletterpopup', 1, 7*24*60);

        return redirect()->back()->with('message', 'newsletter')->withCookie($cookie);
    }
}
