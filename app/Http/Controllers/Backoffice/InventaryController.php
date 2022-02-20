<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Imports\StockImport;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class InventaryController extends Controller
{
    public function index(){
        $data['shop_id'] = Session::get('shop_id');
        $data['categories'] = Category::where('shop_id',Session::get('shop_id'))->where('parent_id',null)->where('active',true)->get();
        $data['products']  = Product::where('active',true)->where('shop_id',Session::get('shop_id'))->get();
        return view('backoffice.inventary.index',$data);
    }

    public function import(Request $request){
        if($request->file('file')){
            Excel::import(new StockImport,$request->file('file'));

            return redirect()->route('b.inventary.index')->with('finish','Se ha importado exitosamente!');
        }else{
            return redirect()->back()->withErrors(['stock_message' => 'No se ha seleccionado ningun archivo.']);
        }

    }
}
