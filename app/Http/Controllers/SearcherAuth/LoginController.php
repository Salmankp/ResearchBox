<?php

namespace App\Http\Controllers\SearcherAuth;
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

    use AuthenticatesUsers;

    protected $redirectTo='/searcher-profile';


    public function showLoginForm()
    {
        return view('auth/searcherLogin');
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

      if(Auth::guard('searcher')->attempt(['email'=>$request->email, 'password'=>$request->password])){

        return redirect('searcher-profile');
      }
    //  return redirect()->back->withInput($request->only('email'));
    return redirect('/searcher-showlogin')->withErrors(['Email or Password is wrong','msg']);
    }


}
