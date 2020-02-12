<?php

namespace App\Http\Controllers\AdminAuth;
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

    protected $redirectTo='/admin-profile';


    public function showLoginForm()
    {
        return view('auth/adminLogin');
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

      if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){

        return redirect('admin-profile');
      }
    //  return redirect()->back->withInput($request->only('email'));
    return redirect('/admin-showlogin')->withErrors(['Email or Password is wrong','msg']);
    }

}
