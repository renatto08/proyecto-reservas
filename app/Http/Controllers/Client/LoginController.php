<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        logout as performLogout;
    }

    private $shop = null;

    public function __construct()
    {
        if(Route::current()) {
            $shop_code = Route::current()->parameter('code');
            if ($shop_code) {
                $this->shop = Shop::where('code', $shop_code)->firstOrFail();
            }

            $guard = backpack_guard_name();

            $this->loginPath = property_exists($this, 'loginPath') ? $this->loginPath
                : route('shop.account',['code' => $this->shop->code ]);

            // Redirect here after successful login.
            $this->redirectTo = property_exists($this, 'redirectTo') ? $this->redirectTo
                : route('shop.home',['code' => $this->shop->code ]);

            // Redirect here after logout.
            $this->redirectAfterLogout = route('shop.home',['code' => $this->shop->code ]);

        }



        //$this->middleware("auth.client", ['except' => ['index','postLogin','logout']]);
        //$this->middleware('auth')->except(['index','postLogin']);



    }

    public function index(){
        if(Auth::guard(backpack_guard_name())->check()){
            return Redirect::route('b.selectshop');
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
            return back()->withInput();
        }
        return Redirect::route('shop.account',['code'=>$this->shop->code])->withInput()->with('error','Opps! You have entered invalid credentials');
    }

    protected function guard()
    {
        return backpack_auth();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return Redirect::route('shop.home');

    }
}
