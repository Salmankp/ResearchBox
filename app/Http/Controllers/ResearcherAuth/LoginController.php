<?php

namespace App\Http\Controllers\ResearcherAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    //protected $redirectTo='/researcher-home';


    public function showLoginForm()
    {
        return view('auth/researcherLogin');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      $this->validate($request, [
        'email'=>'required|email',
        'password'=>'required|min:6'
      ]);


      if(Auth::guard('researcher')->attempt(['email'=>$request->email, 'password'=>$request->password])){

        return redirect('/researcher-profile');
      }
    // return redirect('/researcher-showlogin')->back->withInput($request->only('email'));
      return redirect('/researcher-showlogin')->withErrors(['Email or Password is wrong','msg']);

    }


}
