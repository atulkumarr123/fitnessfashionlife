<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
        return view('article');
    }

    public function home()
    { Log::info("First line");
        Log::info("Logging one variable: " . this.atul);
        return view('home');
    }
}
