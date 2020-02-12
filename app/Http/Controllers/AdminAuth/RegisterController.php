<?php

namespace App\Http\Controllers\AdminAuth;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;
    //
    // protected $redirectTo = '/home';

    public function showRegistrationForm()
    {
        return view('auth/adminSignup');
    }

    public function register(Request $request)

    {

      $this->validator($request->all())->validate();

      event(new Registered($user = $this->create($request->all())));

      $this->guard()->login($user);

      return view('auth/adminLogin');


    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    protected function validator(array $data)
    {
     return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Admins'],
            'password' => ['required', 'string', 'min:6'],
        ]);


    }


    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


}

}
