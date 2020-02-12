<?php

namespace App\Http\Controllers\SearcherAuth;
use Illuminate\Support\Facades\Auth;
use App\Searcher;
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
        return view('auth/searcherSignup');
    }

    public function register(Request $request)

    {

      $this->validator($request->all())->validate();

      event(new Registered($user = $this->create($request->all())));

      $this->guard()->login($user);

      return view('auth/searcherLogin');


    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard('searcher');
    }

    protected function validator(array $data)
    {
     return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Searchers'],
            'password' => ['required', 'string', 'min:6'],
        ]);


    }


    protected function create(array $data)
    {
        return Searcher::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);


}

}
