<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\AttributeProduct;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Client;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\DetailOrder;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
    }

    public function search_producto_inventary(Request $request){
        $shop_id = $request->get('shop_id',0);
        $type = $request->get('type','text');
        $q = $request->get('q',0);

        /*$req = AttributeProduct::with(['product','color','size'])->whereHas('product',function($query) use($q){
            $query->where('title','like',"%$q%");
        })->orWhere('sku',$q)->get();*/

        /*if($type=='text'){
            $attributes = AttributeProduct::with(['product','color','size'])->where('sku',$q)->where('shop_id',$shop_id)->get();
        }else{
        }*/

        $attributes = AttributeProduct::with(['product','color','size'])->where('product_id',$q)->where('shop_id',$shop_id)->get();

        return response()->json($attributes);
    }

    public function search_producto(Request $request){
        $shop_id = $request->get('shop_id',0);
        $type = $request->get('type','text');
        $q = $request->get('q',0);

        $req = AttributeProduct::with(['product','color','size'])->whereHas('product',function($query) use($q){
            $query->where('title','like',"%$q%")->where('active',true);
        })->where('shop_id',$shop_id)->orWhere('sku',$q)->get();

        /*if($type=='text'){
            $attributes = AttributeProduct::with(['product','color','size'])->where('sku',$q)->where('shop_id',$shop_id)->get();
        }else{
            $attributes = AttributeProduct::with(['product','color','size'])->where('product_id',$q)->where('shop_id',$shop_id)->get();
        }*/

        return response()->json($req);
    }

    public function detail_order(Request $request){
        $order_id = $request->get('id',0);
        $detalle = DetailOrder::with(['product','attribute'])->where('order_id',$order_id)->get();
        if($detalle){
            return response()->json($detalle);
        }else{
            return response()->json([]);
        }

    }

    public function attribute_search(Request $request){
        $search_term = $request->input('q');
        $form = collect($request->input('form'))->pluck('value', 'name');

        $product_id = $form['product_id'];
        $attrs = AttributeProduct::where('product_id',$product_id)->paginate(999);
        return $attrs;
    }

    public function category_search(Request $request){
        $form = collect($request->input('form'))->pluck('value', 'name');

        $shop_id = $form['shop_id'];
        $attrs = Category::where('shop_id',$shop_id)->paginate(999);
        return $attrs;
    }

    public function client_search(Request $request){
        $form = collect($request->input('form'))->pluck('value', 'name');

        $shop_id = $form['shop_id'];
        $attrs = Client::where('shop_id',$shop_id)->paginate(999);
        return $attrs;
    }

    public function campaign_search(Request $request){
        $form = collect($request->input('form'))->pluck('value', 'name');

        $shop_id = $form['shop_id'];
        $attrs = Campaign::where('shop_id',$shop_id)->paginate(999);
        return $attrs;
    }

    public function coupon_search(Request $request){
        $form = collect($request->input('form'))->pluck('value', 'name');

        $shop_id = $form['shop_id'];
        $attrs = Coupon::where('shop_id',$shop_id)->paginate(999);
        return $attrs;
    }

    public function category_parent(Request $request){
        $form = collect($request->input('form'))->pluck('value', 'name');
        $shop = $form['shop_id'];
        $res = Category::where('shop_id',$shop)->where('name','like','%'.$request->input('q').'%')->where('parent_id',null)->orderBy('name')->paginate(9999);
        return $res;
    }

    public function color(Request $request){
        $form = collect($request->input('form'))->pluck('value', 'name');
        $shop = $form['shop_id'];
        $res = Color::where('shop_id',$shop)->where('name','like','%'.$request->input('q').'%')->orderBy('name','asc')->paginate(9999);
        return $res;
    }
    public function size(Request $request){
        $form = collect($request->input('form'))->pluck('value', 'name');
        $shop = $form['shop_id'];
        $res = Size::where('shop_id',$shop)->where('size','like','%'.$request->input('q').'%')->orderBy('size','asc')->paginate(9999);
        return $res;
    }

    public function product(Request $request){
        $search_term = $request->input('q');
        $form = collect($request->input('form'))->pluck('value', 'name');
        $shop = $form['shop_id'];
        $res = Product::where('title','like','%'.$search_term.'%')->where('shop_id',$shop)
            ->where('active',true)->orderBy('title','asc')->paginate(9999);
        return $res;
    }



}
