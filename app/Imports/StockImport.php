<?php
namespace App\Imports;

use App\Models\AttributeProduct;
use App\Models\Color;
use App\Models\Inventary_product;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class StockImport implements ToModel,WithStartRow
{
   public function model(array $row)
   {
       $color = Color::where('shop_id',$row[0])->where('name',$row[5])->first();
       $size = Size::where('shop_id',$row[0])->where('size',$row[6])->first();
       if(isset($color->id) && isset($size->id)){
           $attr_id = AttributeProduct::where('shop_id',$row[0])->where('color_id',$color->id)->where('size_id',$size->id)->first();
           if($attr_id){
               //recalcular
               $attr_id->stock = $attr_id->stock + $row[3];
               $attr_id->save();

               $total_a_in = Inventary_product::where('shop_id',Session::get('shop_id'))
                   ->where('product_id',$row[1])->where('type','ENTRADA')->where('attribute_product_id',$attr_id->id)->sum('q');

               $total_a_sal = Inventary_product::where('shop_id',Session::get('shop_id'))
                   ->where('product_id',$row[1])->where('type','SALIDA')->where('attribute_product_id',$attr_id->id)->sum('q');

               $total_a = ($total_a_in - $total_a_sal)+ $row[3];
               $prod = Product::find($row[1]);
               $prod->stock = $total_a;
               $prod->save();

               return new Inventary_product([
                   'shop_id' => $row[0],
                   'product_id' => $row[1],
                   'type' => $row[2],
                   'q' => $row[3],
                   'attribute_product_id' => $attr_id->id,
                   'description' => $row[4]
               ]);
           }
       }

   }

   public function startRow(): int
   {
       return 2;
   }
}