<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\SMS\Facades\SMS;

class PagesController extends Controller
{

    public function about()
    {
        return view('miscellaneous.about');
    }
    public function talkToUs()
    {
        return view('miscellaneous.talkToUs');
    }
    public function policy()
    {
        return view('miscellaneous.policy');
    }
    public function termsConditions()
    {
        return view('miscellaneous.termsConditions');
    }

    public function home()
    { Log::info("First line");
        $articles = Article::all();
//        dd($articles);
        return view('home')->with('articles', $articles);
    }

    public function sendEmailReminder()
    {
        SMS::send('emails.reminder', [], function($sms) {
            $sms->to('9910893838','airtel');
        });
//
//        Mail::send('emails.reminder', ['name' => 'Rohan'], function ($m) {
//            $m->to('+919910893838@airtelap.com', 'Kumar')->subject('Your Reminder!');
//        });
        return "Your email has been sent successfully";
    }
}
