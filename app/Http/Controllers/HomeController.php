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
        if(Auth::id() == '1'){
            $users = User::with('flights')->get();
            return view('admin', compact('users'));
        }else{
            $user = User::with('flights')->where('id', Auth::id())->first();
            return view('home', compact("user"));
        }                
    }

}
