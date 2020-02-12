<?php

namespace App\Http\Controllers\ResearcherAuth;
use Illuminate\Support\Facades\Auth;
use App\Researcher;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\http\Request;
use Illuminate\Support\Str;
use Mail;
use App\Mail\verifyEmail;


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

    //protected $redirectTo = '/home';

    public function showRegistrationForm()
    {
        return view('auth/researcherSignup');
    }

    public function register(Request $request)
    {

       $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
          return redirect(route('verifyEmailFirst'));

        return view('auth/researcherLogin');



    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function guard()
    {
        return Auth::guard('researcher');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Researchers'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }


    protected function create(array $data)
    {
        $researcher =  Researcher::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'phone' => $data['phone'],
            'zip_code' => $data['zip_code'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'organization' => $data['organization'],
            'experience' => $data['experience'],
            'category' => $data['category'],
            'position' => $data['position'],
            'area' => $data['area'],
            'major' => $data['major'],
            'type' => $data['type'],
            'description' => $data['description'],
            'verifyToken'=> Str::random(40),

        ]);

        $thisResearcher = Researcher::findorfail($researcher->id);
        $this->sendEmail($thisResearcher);
        return $researcher;

    }

    public function sendEmail($thisResearcher){

    Mail::to($thisResearcher['email'])->send(new verifyEmail($thisResearcher));
    }

    public function verifyEmailFirst(){

      return redirect('/researcher-showregister')->withErrors(['Verify Email First','msg']);
    }

    public function sendEmailDone($email, $VerifyToken){

          $researcher = Researcher::where(['email' => $email, 'verifyToken' => $VerifyToken])->first();
          if($researcher){

            $researcher =  Researcher::where(['email' => $email, 'verifyToken' => $VerifyToken])->update(['status' =>'1', 'verifyToken' =>NULL]);

            return redirect('/researcher-showlogin');

          }
          else{

              return 'Researcher not found';

            }

    }

}
