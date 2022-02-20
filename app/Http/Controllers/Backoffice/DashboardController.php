<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Shop;
use App\Models\ShopUser;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function selectShop(){
        
        //$shops = Shop::where('active',true)->get(); //ShopUser::where('user_id',backpack_user()->id)->get();
        $my_shop = ShopUser::where('user_id',backpack_user()->id)->pluck('shop_id');
        $shops = Shop::where('active',true)->whereIn('id',$my_shop)->get();

           
        foreach($shops as $shop){
            Session::put('shop_id',$shop->id);
            Session::put('shop_code',$shop->code);
            Session::put('shop_name',$shop->name);
        }


        
       // return view('backoffice.select',$data);
       
       return Redirect::route('b.dashboard');
    }

    public function postSelectShop(Request $request){
        if($request->method()=='post'){
            request()->validate([
                'shop' => 'required'
            ]);
        }

        Session::put('shop_id',(int)$request->input('shop'));
        $shop = Shop::findOrFail($request->input('shop'));
        if($shop){
            Session::put('shop_code',$shop->code);
            Session::put('shop_name',$shop->name);
        }
        return Redirect::route('b.dashboard');
    }

    public function index(){
        
        //clients
        $shop_id = Session::get('shop_id',0);

        $clients =Client::where('parent_id',backpack_user()->id);
        $my_clients = backpack_user()->client ? [backpack_user()->client->id] : [];
        $my_clients = array_merge($clients->pluck('id')->toArray(),$my_clients);
        $data['orders'] = Order::whereIn('client_id',$my_clients)->where('shop_id',$shop_id)->whereIn('status',['Reserva','Venta'])->limit(6)->get();

        $data['count_reserva'] = Order::whereIn('client_id',$my_clients)->where('shop_id',$shop_id)->where('status','Reserva')->count();
        $data['count_sell'] = Order::whereIn('client_id',$my_clients)->where('shop_id',$shop_id)->where('status','Venta')->count();
        $data['count_venta'] = Order::whereIn('client_id',$my_clients)->where('shop_id',$shop_id)->where('status','Venta')->sum('total');
        $data['count_cliente'] = $clients->count();

        //system payment

        $data['sell_card'] = Order::whereIn('client_id',$my_clients)->where('shop_id',$shop_id)->where('payment','tarjeta')->where('status','Venta')->sum('total');
        $data['effective_card'] = Order::whereIn('client_id',$my_clients)->where('shop_id',$shop_id)->where('payment','efectivo')->where('status','Venta')->sum('total');
        $data['transf_card'] = Order::whereIn('client_id',$my_clients)->where('shop_id',$shop_id)->where('payment','deposito')->where('status','Venta')->sum('total');

        return view('backoffice.dashboard',$data);
    }
}
