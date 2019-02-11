<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('flights')->where('id', Auth::id())->first(); 
        //dd($user_flights);
        return view('home', compact("user"));
    }

}
