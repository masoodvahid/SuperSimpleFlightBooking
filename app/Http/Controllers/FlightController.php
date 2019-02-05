<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Flight;
use App\User;


class FlightController extends Controller
{
    public function list()
    {
        $flights = Flight::all()->sortBy("date");        
        return view('index', compact("flights"));
    }

    public function search(Request $request)
    {
    	// Daryafte parvazha bar asase search
    	//$flights  = Flight::Where('from', "$request->from")->Where('to', "$request->to")->get();
      $flights  = Flight::Where('from', "$request->from")->Where('to', "$request->to")->whereBetween('date',array("$request->checkin","$request->checkout"))->get();

    	// Agar parvazi motabehgh search yaft nashod khata bede
    	if (!count($flights)){
    		return view('index')->withErrors('پروازی یافت نشد.');
    	}else{
    		return view('index', compact("flights")); // It Just returend Query results
        return view('index', compact("flights"))->withInput(); // It Dosent work
    	}
    }

    public function reserve($id){
      $flight = Flight::find($id);
    	return view('reserve', compact("flight"));
    }

    public function register(Request $request){
    	$user->create($request->all());
    }
}
