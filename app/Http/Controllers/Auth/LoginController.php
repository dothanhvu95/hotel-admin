<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request){
      

        $validater=Validator::make($request->all(),[
            "email"=>"required",
            "password"=>"required"
        ],[
            "email.required"=>"Vui lòng nhập email.",
            "password.required"=>"Vui lòng nhập password"
        ]);

        if($validater->fails()){
            return redirect()->back()->withErrors($validater)->withInput();
        }else{
                $email = $request->input('email');
                $password = $request->input('password');

                     
                if(Auth()->attempt(['email'=>$email,'password'=>$password])){

                    return redirect("/admin/dashboard");
                }else{

                        $request->session()->flash("success","username or password wrong");
                        return redirect()->back();
                    }    
                   
                
                
        }
    }
}
