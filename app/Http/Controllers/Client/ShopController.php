<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\AttributeProduct;
use App\Models\Campaign;
use App\Models\Client;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\DetailOrder;
use App\Models\Flete;
use App\Models\Inventary_product;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Suscription;
use App\User;
use Carbon\Carbon;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Culqi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ShopController extends Controller
{
    private $shop = null;
    public function __construct(Request $request)
    {
        if(Route::current()){
            $shop_code = Route::current()->parameter('code');
            if($shop_code){
                $this->shop = Shop::where('code',$shop_code)->firstOrFail();
            }
        }

    }

    public function redirect($shop_id){
        $shop = Shop::findOrFail($shop_id);
        return Redirect::route('shop.home',['code'=>$shop->code]);
    }

    public function home($code){
        $data['shop'] = $this->shop;
        return view('theme_default.home',$data);
    }

    public function cart(Request $request, $code){
        $shop = $this->shop;
        $data['shop'] = $shop;
        //dd(Arr::pluck(shop_get_cart($this->shop->code),'product_id'));
        $ids = Arr::pluck(shop_get_cart($this->shop->code),'product_id');
        $products = Product::whereIn('id',$ids)->get();

        $sub_total = 0;
        $descuento = 0;
        $envio = null;
        $coupon = null;
        $envio_id  = shop_get_session($this->shop->code,'shipping',0);
        $coupon_id  = shop_get_session($this->shop->code,'coupon',0);


        foreach ($products as $prod){
            $obj = shop_get_cart($this->shop->code,$prod->id);
            $sub_total += ($prod->is_sale ? $prod->price_sale : $prod->price) * ($obj ? $obj['q'] : 1);

        }

        if($envio_id){
            $envio = Flete::find($envio_id);
            if($envio)
                shop_set_session($this->shop->code,'shipping_total',$envio->price);
        }

        if($coupon_id){
            $coupon = Coupon::find($coupon_id);
            if($coupon){
                if(strtolower($coupon->type)=='porcentaje'){
                    $descuento = ($sub_total * $coupon->value);
                }else{
                    $descuento = $coupon->value;
                }
                shop_set_session($this->shop->code,'coupon_total',$descuento);
            }
        }


        $data['sub_total'] = $sub_total;
        $data['envio'] = $envio;
        $data['descuento'] = $descuento;
        $data['coupon'] = $coupon;
        $total =  ($sub_total - $descuento) + ($envio ? $envio->price : 0);
        $data['total'] =$total;

        $data['fletes']  = Flete::where('shop_id',$this->shop->id)->where('active',true)->orderBy('name','asc')->get();
        $data['products'] = $products;

        if($request->ajax()){
            return view('theme_default.cart_partials.totals',compact('sub_total','envio','descuento','total','envio','shop','coupon'));
        }else{
            return view('theme_default.cart',$data);
        }
    }

    public function checkout($code){
        $data['shop'] = $this->shop;
        $data['order'] = shop_get_session($this->shop->code,'order',null);
        $data['order_detail'] = shop_get_session($this->shop->code,'order_detail',[]) ? shop_get_session($this->shop->code,'order_detail',[]) : [];
        $data['fletes']  = Flete::where('shop_id',$this->shop->id)->where('active',true)->orderBy('name','asc')->get();
        
        $data['info'] = array(
            'first_name' => '',
            'last_name' => '',
            'dni' => '',
            'email' => '',
            'phone' => '',
        );
        if(backpack_auth()->check()){
            $data['info'] = array(
                'first_name' => backpack_user()->client->first_name,
                'last_name' => backpack_user()->client->last_name,
                'dni' => backpack_user()->client->code,
                'email' => backpack_user()->email,
                'phone' => backpack_user()->client->phone,
            );
        }


        return view('theme_default.checkout',$data);
    }

    public function shop(Request $request,$code,$category=null,$category_id=null){
        $data['shop'] = $this->shop;
        $data['category_id'] = $category_id;
        $data['category_slug'] = $category;
        $new = $request->input('new',null);
        $offer = $request->input('offer',null);

        //mode
        $data['view_list']  = $request->input('view_list',true);
        $data['new']  = $new;
        $data['offer']  = $offer;
        $q = $request->input('q',null);
        $data['q'] = $q;


        $products = Product::where('shop_id',$this->shop->id)->where('active',true);
        if($category_id){
            $products = $products->where('category_id',$category_id);
        }

        if($q){
            $products = $products->where('title','like','%'.$q.'%');
        }
        if($new){
            $products = $products->where('new',true);
        }
        if($offer){
            $products = $products->where('price_sale','>',0);
        }

        //prices min -max
        $price_min = $request->input('price_min',0);
        $price_max = $request->input('price_max',10000);

        $data['price_min'] = $price_min;
        $data['price_max'] = $price_max;
        if($price_min && $price_max){
            $products = $products->whereBetween('price',[$price_min,$price_max]);
        }

        //colors
        $colors = $request->input('colors',null);
        $data['colors'] = $colors;
        if($colors){
            $products = $products->whereHas('attributes',function($q) use ($colors){
               $q->whereIn('color_id',$colors);
            });

            $items = array();
            foreach($colors as $key=>$value){
                $items[$value] = $value;
            }
            $data['colors'] = $items;
        }


        //sizes
        $sizes = $request->input('sizes',null);
        $data['sizes'] = $sizes;
        if($sizes){
            $products = $products->whereHas('attributes',function($q) use ($sizes){
                $q->whereIn('size_id',$sizes);
            });
            $items = array();
            foreach($sizes as $key=>$value){
                $items[$value] = $value;
            }
            $data['sizes'] = $items;
        }

        //$products->dd();


        $products = $products->orderBy('created_at','desc')->paginate();
        $data['productos'] = $products;

        //bestsellers top 10
        $ids = DB::table('detail_orders')
            ->select('product_id',DB::raw('count(*) as  total'))
            ->take(10)
            ->groupBy('product_id')
            ->orderBy('total','desc')
            ->pluck('product_id');


        $products_bestsellers = Product::where('shop_id',$this->shop->id)->whereIn('id',$ids)->where('active',true)->get();
        $data['products_bestsellers'] = $products_bestsellers;
        return view('theme_default.shop',$data);
    }

    public function product($code,$product_id){
        $data['shop'] = $this->shop;
        $product = Product::findOrFail($product_id);
        $data['product'] = $product;
        return view('theme_default.product',$data);
    }


    //Functions extras cart
    public function add_cart(Request $request){
        $product_id = $request->input('product_id');
        $product = Product::findOrFail($product_id);

        $code = $request->input('code');
        //shop_set_cart($code,array());
        //set attribute default
        $attr = $product->attributes()->first();

        if($attr){
            $temp_key = shop_get_cart($code);
            $exists = false;
            foreach($temp_key as $item){
                if($item['product_id']==$product_id){
                    $exists = true;
                }
            }
           if(!$exists){
               $item = array(
                   'product_id' => $product_id,
                   'q' => 1,
                   'attribute_id' => $attr->id,
                   'title' => $product->title,
                   'price' => $product->price,
                   'price_sale' => $product->price_sale,
                   'is_sale' => $product->is_sale,
                   'category' => $product->category->name,
                   'image' => $product->image ? Storage::url($product->image) : null
               );
               shop_add_cart($code,$item);
           }

           $info = array(
               'subtotal' => number_format(shop_cart_info($code,'subtotal'),2),
               'descuento' => number_format(shop_cart_info($code,'descuento'),2),
               'envio' => number_format(shop_cart_info($code,'envio'),2),
               'total' => number_format(shop_cart_info($code,'total'),2),
               'detalle' => shop_get_cart($code)
           );
            return response()->json($info);
        }else{
            return response()->json(['error'=>'El producto no tiene configurado tamaño y colores, por favor contacte con el administrador.']);
        }

    }

    //function add wishlist
    public function add_wishlist(Request $request){
        $product_id = $request->input('product_id');
        $code = $request->input('code');
        //shop_set_wishlist($code,array());
        $item = array(
            'product_id' => $product_id,
        );
        shop_add_wishlist($code,$item);
        //var_dump(shop_get_cart($code));
        return response()->json(['product_id'=>$product_id]);
    }

    public function delete_wishlist(Request $request){
        $i = (int) $request->input('index',-1);
        $wishlist = shop_get_wishlist($this->shop->code);
        array_splice($wishlist,$i,1);
        //dd($wishlist);
        shop_set_wishlist($this->shop->code,$wishlist);
        return Redirect::route('shop.wishlist',['code' => $this->shop->code])->with('success','Se quito de tu lista de desesos :(');
    }

    public function delete_cart(Request $request){
        $i = (int) $request->input('index',-1);
        $cart = shop_get_cart($this->shop->code);
        array_splice($cart,$i,1);
        //dd($wishlist);
        shop_set_cart($this->shop->code,$cart);
        return redirect()->back();
        //return Redirect::route('shop.cart',['code' => $this->shop->code])->with('success','Se quito el producto de tu carrito :(');
    }

    public function update_cart(Request $request){
        //dd($request->all());

        //update details
        $params = $request->only(['product_id','q','attribute_id','title','price','price_sale','is_sale','category','image','op']);

        if(count($params) && isset($params['product_id']) && $params['op']=='items'){
            $products_update = array();
            for($i=0;$i<count($params['product_id']);$i++){
                $products_update[] = array(
                    'product_id' =>  $params['product_id'][$i],
                    'q' =>  $params['q'][$i],
                    'attribute_id' =>  $params['attribute_id'][$i],
                    'title' => $params['title'][$i],
                    'price' => $params['price'][$i],
                    'price_sale' => $params['price_sale'][$i],
                    'is_sale' => $params['is_sale'][$i],
                    'category' => $params['category'][$i],
                    'image' => $params['image'][$i]
                );
            }
            shop_set_cart($this->shop->code,$products_update);
            if($request->ajax()){
                return response()->json(array('message'=>'Carrito de compra fue actualizado!'));
            }else{
                return Redirect::route('shop.cart', ['code'=>$this->shop->code])->with('success','Carrito de compra fue actualizado!');
            }

        }else if($params['op']=='items'){
            shop_set_cart($this->shop->code,array());
            if($request->ajax()){
                return response()->json(array('message'=>'Carrito de compra fue actualizado!'));
            }else {
                return Redirect::route('shop.cart', ['code' => $this->shop->code])->with('success', 'Carrito de compra fue actualizado!');
            }
        }

        $param_shipping = $request->only(['shipping']);
        if(count($param_shipping) && $params['op']=='shipping'){
            shop_set_session($this->shop->code,'shipping',$param_shipping['shipping']);
            if($request->ajax()){
                return response()->json(array('message'=>'El envio fue actualizado!'));
            }else {
                return Redirect::route('shop.cart', ['code' => $this->shop->code])->with('success', 'El envio fue actualizado!');
            }
        }

        $param_coupon = $request->only(['code_coupon']);
        if(count($param_coupon) && $params['op']=='coupon') {
            //validamos si existe
            $row = null;
            if (!empty($param_coupon['code_coupon'])) {
                $row = Coupon::where('shop_id', $this->shop->id)->where('type_coupon', 'Tienda')->where('code', $param_coupon['code_coupon'])->first();
            } else {
                shop_set_session($this->shop->code, 'coupon', null);
                if($request->ajax()){
                    return response()->json(array('message'=>'Se removio el codigo de cupon','alert'=>true,'type'=>'success'));
                }else {
                    return Redirect::route('shop.cart', ['code' => $this->shop->code])->with('success', 'Se removio el codigo de cupon');
                }
            }

            if ($row) {
                shop_set_session($this->shop->code, 'coupon', $row->id);
                if($request->ajax()){
                    return response()->json(array('message'=>'Se agrego el cupon al carrito.Enhorabuena!','alert'=>false));
                }else {
                    return Redirect::route('shop.cart', ['code' => $this->shop->code])->with('success', 'Se agrego el cupon al carrito.Enhorabuena!');
                }
            } else {
                shop_set_session($this->shop->code, 'coupon', null);
                if($request->ajax()){
                    return response()->json(array('message'=>'El codigo de cupon ingresado no existe y/o expiro.Por favor intente con otro codigo.','alert'=>true,'type'=>'error'));
                }else {
                    return Redirect::route('shop.cart', ['code' => $this->shop->code])->with('error', 'El codigo de cupon ingresado no existe y/o expiro.Por favor intente con otro codigo.');
                }
            }

        }
        if($request->ajax()){
            return response()->json(array('message'=>'Opcion invalida.'));
        }else {
            return Redirect::route('shop.cart', ['code' => $this->shop->code]);
        }
    }

    public function checkout_post(Request $request){

        $order = $request->only(['sub_total','coupon','descuento','envio_address','envio','total']);
        $order_detail = shop_get_cart($this->shop->code);


        foreach($order_detail as $key=>$item){
            $p = Product::find($item['product_id']);
            if($p){
                $item_add = array(
                    'product' => $p->title,
                    'is_sale' => $p->is_sale,
                    'price' => $p->price,
                    'price_sale' => $p->price_sale,
                );
               $item_merge = array_merge($item,$item_add);
               $order_detail[$key] = $item_merge;
            }
        }



        //set vars
        shop_set_session($this->shop->code,'order',$order);
        shop_set_session($this->shop->code,'order_detail',$order_detail);
        return Redirect::route('shop.checkout',['code'=>$this->shop->code]);
    }

    public function account(Request $request){
        if(backpack_user()){
            return Redirect::route('shop.home',['code'=> $this->shop->code]);
        }
        $data['shop'] = $this->shop;
        return view('theme_default.account',$data);
    }


    public function buy(Request $request){
        /*if(!backpack_auth()){
            return Redirect::route('shop.account',['code'=> $this->shop->code]);
        }*/

        $SECRET_KEY = "pk_live_TnYjeuxe7z6gKQc4";// "sk_test_IGAU6SJOlMX2y0dD";
        $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
        $token_order = $request->input('token',null);

        $campaing = Campaign::where('shop_id',$this->shop->id)->orderBy('id','desc')->first();

        $order = shop_get_session($this->shop->code,'order',null);
        $order_details = shop_get_session($this->shop->code,'order_detail',[]);
        if($campaing && $order){
            $head_json = $request->input('head');

            
            if(!backpack_auth()->check()){
                $user = User::where('username',$head_json['dni'])->first();
                if(!$user){
                    $user = new User();
                    $user->name = $head_json['first_name'];
                    $user->username = $head_json['dni'];
                    $user->email = $head_json['email'];
                    $user->password = Hash::make($head_json['dni']);
                    $user->save();

                    $client = new Client();
                    $client->shop_id = $this->shop->id;
                    $client->user_id = $user->id;
                    $client->first_name = $head_json['first_name'];
                    $client->last_name = $head_json['last_name'];
                    $client->phone = $head_json['phone'];
                    $client->code = $head_json['dni'];
                    $client->birthdate = Carbon::now();
                    $client->address = isset($order['envio']) ? $order['envio_address'] : 'default 12345';
                    $client->save();
                }                   
            }else{
                $user = backpack_user();
            }
            
            //validar en tienda el stock
            //end validar stock 
            $order_new = new Order();
            $order_new->shop_id = $this->shop->id;
            $order_new->client_id = $user->client->id;
            $order_new->campaign_id = $campaing->id;
            $order_new->coupon_id = isset($order['coupon']) ?  $order['coupon'] : null;
            $order_new->discount = null;
            $order_new->discount_offer = null;
            $order_new->flete_address = isset($order['envio']) ? $order['envio_address'] : '';
            $order_new->flete = (double) isset($order['envio']) ?  $order['envio'] : 0;
            $order_new->amount_discount = (double) isset($order['descuento']) ?  $order['descuento'] : 0;
            $order_new->amount_discount_offer = 0;
            $order_new->user_id = $user->id;
            $order_new->status = 'Venta';
            $order_new->sub_total = (double) $order['sub_total'];
            $order_new->sub_total_offer = 0;
            $order_new->total =  (double)$order['total'];
            $order_new->payment = $request->input('checkout_payment_method');
            $order_new->name_bank = 'NINGUNO';
            $order_new->description = $head_json['description'];
            $order_new->flete_address_text = $head_json['flete_address_text'];
            $order_new->save();

            if($order_new){
                foreach($order_details as $item){
                    $det = new DetailOrder();
                    $det->order_id = $order_new->id;
                    $det->product_id = (int) $item['product_id'];
                    $det->attribute_id = (int) $item['attribute_id'];
                    $det->q = (int) $item['q'];
                    $det->price = (double) $item['price'];
                    $det->price_sale = (double) $item['price_sale'];
                    $det->unit = 'UND';
                    $det->gift = false;
                    $det->save();

                    if($det){
                        $reduce_stock = AttributeProduct::find($det->attribute_id);
                        if($reduce_stock){
                            $reduce_stock->stock  = $reduce_stock->stock - $det->q;
                            $reduce_stock->save();

                            //reducimos el stock
                            Inventary_product::create([
                                'shop_id' => $reduce_stock->shop_id,
                                'product_id' => $reduce_stock->product_id,
                                'attribute_product_id' => $det->attribute_id,
                                'type' => 'SALIDA',
                                'q' => $det->q,
                                'description' => 'Compra realizada por catalogo virtual.'

                            ]);
                        }
                    }

                }

                
                $phone_format_culqui = $user->client->phone;
                while(strlen($phone_format_culqui)<5){
                    $phone_format_culqui = '0'.$phone_format_culqui;
                }

                $charge = $culqi->Charges->create(
                    array(
                        "amount" => (int)$order_new->total * 100,
                        "capture" => true,
                        "currency_code" => "PEN",
                        "description" => "Venta con codigo: ".$order_new->id,
                        "email" =>  $user->email,
                        "installments" => 0,
                        "antifraud_details" => array(
                            "address" => 'direccion: '.$user->client->address,
                            "address_city" => "LIMA",
                            "country_code" => "PE",
                            "first_name" => $user->client->first_name,
                            "last_name" => $user->client->last_name,
                            "phone_number" => $phone_format_culqui,
                        ),
                        "source_id" => $token_order
                    )
                );

                //send email
                Mail::to($user->email)->send(new OrderShipped($order_new));

                //finish
                //clear session cart
                shop_set_session($this->shop->code,'order',null);
                shop_set_session($this->shop->code,'order_detail',null);
                shop_set_cart($this->shop->code,[]);
                shop_set_session($this->shop->code,'coupon',null);
                shop_set_session($this->shop->code,'shipping',null);
            }

            //return Redirect::route('shop.success',['code'=> $this->shop->code]);
            return response()->json(array('qulqi'=>$charge,'order_id'=>$order_new->id));

        }
        //return Redirect::route('shop.home',['code'=>$this->shop->code]);
        return response()->json( json_encode(array('error'=>'Ocurrio un error al procesar por favor contacte al administrador.')),401);
    }

    public function success(Request $request){
        if(!backpack_user()){
            return Redirect::route('shop.home',['code'=> $this->shop->code]);
        }
        $data['shop'] = $this->shop;
        $data['order_id'] = $request->input('order_id',null);
        return view('theme_default.success',$data);
    }

    public function wishlist(Request $request){
        $data['shop'] = $this->shop;

        //dd(Arr::pluck(shop_get_cart($this->shop->code),'product_id'));
        //shop_set_wishlist($this->shop->code,[]);
        $ids = Arr::pluck(shop_get_wishlist($this->shop->code),'product_id');
        $products = Product::whereIn('id',$ids)->get();
        $data['products'] = $products;

        return view('theme_default.wishlist',$data);
    }

    public function contact(Request $request){
        $data['shop'] = $this->shop;

        return view('theme_default.contact',$data);
    }

    public function login(Request $request){
        $data['shop'] = $this->shop;

        return view('theme_default.login',$data);
    }

    public function subscription(Request $request){
        Suscription::create($request->only(['shop_id','type','name','subject','message','email']));
        return redirect()->route('shop.home',['code'=>$this->shop->code])->with(
            'subscription_message',$request->input('type'))->with('subscription_email',$request->input('email'));
        //dd($request->all());
    }
}
