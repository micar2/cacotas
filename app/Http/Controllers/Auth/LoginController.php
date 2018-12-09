<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('forms.login');
    }

    public function getin(Request $request)
    {
//        request()->validate([
//            'email'=>'required'|'email',
//            'password'=>'required'
//        ]);
//        $this->validate(request(),[
//            'email'=>'required'|'email',
//            'password'=>'required'
//            ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $rol = User::where('email', '=', $request['email'])->first();
            //$request->Session()->put('rol', $request['rol']);
            //Session::put('rol', $request['rol']);

            if ($rol->rol=='admin'){
                return view('admin.welcome');
            }
            if ($rol->rol=='client'){
                return view('welcome');
            }

        }else{
            return view('forms.login');
        }

    }

    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}
