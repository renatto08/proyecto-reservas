<?php
/**
 * Created by PhpStorm.
 * User: Joseph.Carrasco
 * Date: 10/12/2019
 * Time: 02:39 PM
 */

use App\Models\Shop;
use App\Models\ShopUser;

if(!function_exists('shop_asset')){
    function shop_asset($theme='default',$path=''){
        $path = ! $path || (substr($path, 0, 1) == '/') ? $path : '/'.$path;
        return asset('themes/'.$theme.$path);
    }
}

if(!function_exists('shop_get_cart')){
    function shop_get_cart($shop='default',$product_id = null){
        $products =Session::get($shop.'_cart',array());
        if($product_id){
            foreach ($products as $prod){
                if($prod['product_id']==$product_id) return $prod;
            }
            return null;
        }
        return $products;
    }
}

if(!function_exists('shop_get_wishlist')){
    function shop_get_wishlist($shop='default',$product_id = null){
        $products =Session::get($shop.'_wishlist',array());
        if($product_id){
            foreach ($products as $prod){
                if($prod['product_id']==$product_id) return $prod;
            }
            return null;
        }
        return $products;
    }
}


if(!function_exists('shop_add_cart')){
    function shop_add_cart($shop='default',$item = 0){
        $products = shop_get_cart($shop);
        $products[] = $item;
        Session::put($shop.'_cart',$products);
        return true;
    }
}

if(!function_exists('shop_cart_info')){
    function shop_cart_info($shop='default',$option = ''){
        $products = shop_get_cart($shop);
        $subtotal = 0;
        foreach ($products as $p){
            $subtotal += ((float) $p['is_sale'] ? $p['price_sale'] : $p['price']) * (int) $p['q'];
        }

        $coupon = (float) shop_get_session($shop,'coupon_total',0);
        $envio =  (float) shop_get_session($shop,'shipping_total',0);

        if(strtolower($option)=='total'){
            return ($subtotal - $coupon) + $envio;
        }elseif (strtolower($option)=='subtotal'){
            return $subtotal;
        }elseif (strtolower($option)=='envio'){
            return $envio;
        }elseif (strtolower($option)=='descuento'){
            return $coupon;
        }
        return null;
    }
}


if(!function_exists('shop_add_wishlist')){
    function shop_add_wishlist($shop='default',$item = 0){
        $products = shop_get_wishlist($shop);
        $products[] = $item;
        Session::put($shop.'_wishlist',$products);
        return true;
    }
}

if(!function_exists('shop_set_cart')){
    function shop_set_cart($shop='default',$item = array()){
        Session::put($shop.'_cart',$item);
        return true;
    }
}

if(!function_exists('shop_set_wishlist')){
    function shop_set_wishlist($shop='default',$item = array()){
        Session::put($shop.'_wishlist',$item);
        return true;
    }
}

if(!function_exists('shop_set_session')){
    function shop_set_session($shop='default',$key=null,$item = null){
        if($key){
            Session::put($shop.'_'.$key,$item);
            return true;
        }else{
            return false;
        }
    }
}

if(!function_exists('shop_get_session')){
    function shop_get_session($shop='default',$key=null,$default=null){
        if($key){
            return Session::get($shop.'_'.$key,$default);
        }else{
            return false;
        }
    }
}

if(!function_exists('admin_column_shop')){
    function admin_column_shop($label='Tienda'){
        return  [
            'label' => $label, // Table column heading
            'type' => "select",
            'name' => 'shop', // the method that defines the relationship in your Model
            'entity' => 'shop', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\Models\Shop", // foreign key model
        ];
    }
}

if(!function_exists('admin_column_category')){
    function admin_column_category($label='Categoria'){
        return  [
            'label' => $label, // Table column heading
            'type' => "select",
            'name' => 'category', // the method that defines the relationship in your Model
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\Models\Category", // foreign key model
        ];
    }
}

if(!function_exists('admin_column_user')){
    function admin_column_user($label='Usuario',$entity='user'){
        return  [
            'label' => $label, // Table column heading
            'type' => "select",
            'name' => $entity, // the method that defines the relationship in your Model
            'entity' => $entity, // the method that defines the relationship in your Model
            'attribute' => "username", // foreign key attribute that is shown to user
            'model' => "App\User", // foreign key model
        ];
    }
}

if(!function_exists('admin_filter_select2')){
    function admin_filter_select2(&$crud,$cls,$label,$name,$value='name',$id='id',$condition=[]){
        if($cls){
            $crud->addFilter([
                'name' => $name,
                'type' => 'select2',
                'label' => $label
            ],function() use ($cls,$value,$id,$condition){
                $temp = new $cls;
                foreach($condition as $key=>$val){
                    $temp = $temp->where($key,$val);
                }
                return $temp->get()->pluck($value,$id)->toArray();
            },function($value) use ($crud,$name){
                $crud->addClause('where',$name,$value);
            });
        }
    }
}


if(!function_exists('backoffice_model_query')){
    function backoffice_model_query($model){
        $m = new $model();
        return $m->get();
    }
}

if(!function_exists('backoffice_my_shops')){
    function backoffice_my_shops(){
        $my_shop = ShopUser::where('user_id',backpack_user()->id)->pluck('shop_id');
        $shops = Shop::where('active',true)->whereIn('id',$my_shop)->get();
        return $shops;
    }
}

if(!function_exists('shop_access_permission')){
    function shop_access_permission($user,$view){
        $r = ['list','show'];
        if(strtolower($view)==='shop-r') return $r;
        return [];
    }
}