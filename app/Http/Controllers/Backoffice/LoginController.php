<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function __construct()
    {
        $guard = backpack_guard_name();

        $this->middleware("auth.client", ['except' => ['index','postLogin','logout']]);
        //$this->middleware('auth')->except(['index','postLogin']);
        $this->loginPath = property_exists($this, 'loginPath') ? $this->loginPath
            : route('b.login');

        // Redirect here after successful login.
        $this->redirectTo = property_exists($this, 'redirectTo') ? $this->redirectTo
            : route('b.dashboard');

        // Redirect here after logout.
        $this->redirectAfterLogout = route('b.login');
    }

    public function index(){
          
        
        if(Auth::guard(backpack_guard_name())->check()){
           // dd('index login - logueado'); 
            return Redirect::route('b.dashboard');
            
        }
        return view('backoffice.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only(['username','password']);
        if(Auth::guard(backpack_guard_name())->attempt($credentials)){
            return Redirect::route('b.dashboard');
        }
        return Redirect::to('backoffice/login')->with('error','Opps! Tienes que ingresar las credenciales correctas.')->withInput($request->all());
    }

    protected function guard()
    {
        return backpack_auth();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return Redirect::route('b.login');

    }
}
