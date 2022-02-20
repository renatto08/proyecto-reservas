<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\OrdenSalida;
use App\Models\OrdenSalidaDetalle;
use App\Models\Shop;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\AttributeProduct;
use App\Models\Inventary_product;

class OrdenSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['campaigns'] = Campaign::where('active',true)->where('shop_id',Session::get('shop_id'))->get();
        $data['shop_id'] = Session::get('shop_id');
        //$data['shop'] = Shop::findOrFail(Session::get('shop_id'));
        return view('backoffice.orden_salida.index',$data);
    }

    public function table_ajax(Request $request){

        //$filter_client_id = $request->get('filter_client_id');
        $filter_campaign = $request->get('filter_campaign');
        $filter_date_from = $request->get('filter_date_from');
        $filter_date_to = $request->get('filter_date_to');
        $salidas = OrdenSalida::with(['detalle.product_change','detalle.product_deliver']);

        //filter
        //if((int)$filter_client_id>0) $salidas = $salidas->where('client_id',$filter_client_id);
        if(strlen($filter_campaign)>0) $salidas = $salidas->where('campaign_id',$filter_campaign);

        if(strlen($filter_date_from)>0){
            $from = $filter_date_from;
        }else{
            $from = Carbon::createFromDate(2010,01,01);
        }
        if(strlen($filter_date_to)>0){
            $to = $filter_date_to;
        }else{
            $to = Carbon::now();
        }

        $salidas = $salidas->whereBetween('created_at',[$from,$to]);

        $salidas = $salidas->where('shop_id',Session::get('shop_id'))->orderBy('created_at', 'desc')->get();

        return datatables()->of($salidas)
            ->addColumn('serie',function($row){
                //return '<a href="'.route('orders.show',$row->id).'">'.$row->serie.'</a>';
                return '<a href="javascript:;" class="badge badge-primary">'.$row->serie.'</a>';
            })
            ->addColumn('client',function($q){
                return $q->user->client->full_name;
            })
            ->addColumn('campaign',function($q){
                return $q->campaign->name;
            })
            ->rawColumns(['serie'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['campaign'] = Campaign::where('active',true)->where('shop_id',Session::get('shop_id'))->get();
        $data['shop_id'] = Session::get('shop_id');
        $data['shop'] = Shop::findOrFail(Session::get('shop_id'));
        return view('backoffice.orden_salida.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->input('detalle'));

        $salida = new OrdenSalida();
        $salida->shop_id = Session::get('shop_id');
        $salida->campaign_id = $request->input('campaign_id');
        $salida->user_id = backpack_user()->id;
        $salida->order_id = $request->input('order_id');
        $salida->serie = $request->input('serie');
        $salida->save();

        foreach($request->input('detalle') as $item ){
            $det = new OrdenSalidaDetalle();
            $det->cambio_producto_id = $salida->id;
            $det->product_change_id = $item['product_id_one'];
            $det->product_change_q = $item['product_q_one'];
            $det->product_deliver_id = $item['product_id_two'];
            $det->product_deliver_q = $item['product_q_two'];
            $det->save();
            
            //sumar stocks
            $reduce_stock = AttributeProduct::find($det->product_change_id);
            if($reduce_stock){
                $reduce_stock->stock  = $reduce_stock->stock + $det->product_change_q;
                $reduce_stock->save();

                //reducimos el stock
                 Inventary_product::create([
                    'shop_id' => $reduce_stock->shop_id,
                    'product_id' => $reduce_stock->product_id,
                    'attribute_product_id' => $det->product_change_id,
                    'type' => 'ENTRADA',
                    'q' => $item['product_q_one'],
                    'description' => 'Cambio realizada por cajero'
                ]);
            }

            //$salida
            $reduce_stock = AttributeProduct::find($det->product_deliver_id);
            if($reduce_stock){
                $reduce_stock->stock  = $reduce_stock->stock - $det->product_deliver_q;
                $reduce_stock->save();

                //reducimos el stock
                Inventary_product::create([
                    'shop_id' => $reduce_stock->shop_id,
                    'product_id' => $reduce_stock->product_id,
                    'attribute_product_id' => $det->product_deliver_id,
                    'type' => 'SALIDA',
                    'q' => $det->product_deliver_q,
                    'description' => 'Cambio realizada por cajero'
                ]);
            }

        }
        

        return response()->json(['message' => 'registro realizado!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
