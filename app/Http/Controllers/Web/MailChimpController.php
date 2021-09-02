<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class MailChimpController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->email;
        Newsletter::subscribeOrUpdate($email);
        return redirect()->back()->with('message', 'newsletter');
    }
}
