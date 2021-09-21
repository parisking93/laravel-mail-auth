<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller per tutti gli utenti 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }
}
