<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Flight;
use App\User;
use App\Validator;
use Illuminate\Support\Facades\Auth;


class FlightController extends Controller
{
    /**
    * نمایش لیست تمام پروازهای موجود
    */
    public function list()
    {
        $flights = Flight::all()->sortBy("date");
        return view('index', compact("flights"));
    }

    /**
    * جستجوی پرواز
    */
    public function search(Request $request)
    {
    	// Daryafte parvazha bar asase search
      $flights  =
      Flight::Where('from', "$request->from")                               // Serach By Flight From
      ->Where('to', "$request->to")                                         // Search By Flight Destination
      ->whereBetween('date',array("$request->checkin","$request->checkout"))// Search By Flight Allowed Date
      ->get();

      // اگر جستجو نتیجه ای نداشت همراه با خطا به صفحه قبل بر می گردد در غیر این صورت نتایج را به همان صفحه ارسال می کند.
    	if (!count($flights)){
    		return view('index')->withErrors('پروازی یافت نشد.');
    	}else{
    		return view('index', compact("flights")); // بازگشت به صفحه اول همراه با نتایج جستجو
    	}
    }

    /**
    * نمایش صفحه مشخصات کاربر برای بخش رزور پرواز
    */
    public function show($id){
      $flight = Flight::find($id);
    	return view('reserve', compact("flight"));
    }



    public function delete($user_id, $flight_id){
      $user = User::find($user_id);
      $user->flights()->detach($flight_id);
      return redirect()->route('home')->withErrors('حذف با موفقیت انجام شد.');
    }

    /**
    * عملیات ثبت کاربر در دیتابیس و ثبت مشخصات پرواز او
    */
    public function reserve(Request $request){
    $request->validate([
          'firstname' => 'required | string | max:100',
          'lastname'  => 'required | string | max:100',
          'gender'    => 'required | string',
          'code_melli'=> 'required | integer | digits_between:8,10 | unique:users',
          'mobile'    => 'required | integer | digits_between:10,11',
          'email'     => 'required | string | email | max:255 | unique:users',
      ]);

    	$user_register = User::create($request->all());
      $user_register->flights()->sync($user_register->id); // Flight-User :: Baraye Table Vasete bein Flight va User

      Auth::login($user_register);
      $user = User::with('flights')->where('id', Auth::id())->first(); 
	    
      return view('home', compact("user")); //->withErrors('پرواز با موفقیت ثبت شد.');
    }
}
