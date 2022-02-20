<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Mail\EmailReserva;
use App\Models\AttributeProduct;
use App\Models\Campaign;
use App\Models\Client;
use App\Models\Coupon;
use App\Models\DetailOrder;
use App\Models\Flete;
use App\Models\Inventary_product;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $shop_id = Session::get('shop_id',0);
        $clients =Client::where('parent_id',backpack_user()->id);
        $data['clients'] = $clients->get();
        $data['title'] = 'Mis Reservas';
        $data['status'] = 'me_reservas';

        $my_clients = [backpack_user()->client->id];
        $my_clients = array_merge($clients->pluck('id')->toArray(),$my_clients);
        $data['reservas'] = []; //Order::whereIn('client_id',$my_clients)->where('shop_id',$shop_id)->where('status','Reserva')->orderBy('created_at','desc')->get();
        //generales
        $data['campaigns'] = Campaign::where('shop_id',Session::get('shop_id'))->where('active',1)->get();

        return view('backoffice.orders.index',$data);
    }

    public function detail_sku(Request $request){
        $attribute_id = $request->input('attribute_id',0);
        $attr = AttributeProduct::findOrFail($attribute_id);

        $attributes = DetailOrder::whereHas('order',function ($q){
            $q->where('status','Reserva');
        })->where('attribute_id',$attribute_id)->get();
        $data['attribute_id'] = $attribute_id;
        $data['item'] = $attr;
        if($request->ajax()){
            return datatables()->of($attributes)
                ->addColumn('serie',function ($q){
                    return $q->order->serie;
                })
                ->addColumn('client',function ($q){
                    return $q->order->client->full_name;
                })
                ->addColumn('product',function ($q){
                    return $q->product->title .' / '.$q->attribute->full_desc;
                })
                ->addColumn('actions',function ($q){
                    return '<a class="btn btn-outline-secondary btn-sm" data - toggle = "tooltip" title = "Ver Venta" href = "'.route('orders.show',$q->order->id).'" ><i class="ti-eye" ></i ></a >';
                })
                ->rawColumns(['actions'])
                ->toJson();
        }else{
            return view('backoffice.orders.detail_sku',$data);
        }

        //$attr = AttributeProduct::

    }

    public function total_sell(Request $request){
        $type = $request->input('status');
        $parent = $request->input('parent');
        if(!$parent && !backpack_user()->hasRole(['administrador'])){
            $parent = 'me';
        }

        $data['sell'] = true;

        $my_clients = [backpack_user()->client->id];

        if(strtolower($parent)=='me'){
            $clients =Client::where('parent_id',backpack_user()->id);
            $my_clients = array_merge($clients->pluck('id')->toArray(),$my_clients);
            //$clients =  Client::whereIn('id',$my_clients)->where('shop_id',Session::get('shop_id'))->get();
        }else{
            $clients = Client::where('shop_id',Session::get('shop_id'))->get();
        }


        if(strtolower($type)=='venta'){
            $data['status'] = 'venta';

            $filter_client_id = $request->get('filter_client_id');
            $filter_campaign = $request->get('filter_campaign');
            $filter_pago = $request->get('filter_pago');
            $filter_name_bank = $request->get('filter_name_bank');
            $filter_date_from = $request->get('filter_date_from');
            $filter_date_to = $request->get('filter_date_to');
            $filter_check_flete = $request->get('filter_check_flete');

            if(strtolower($parent)=='me'){ //yo
                $sells  = Order::whereIn('client_id', $my_clients)->where('shop_id', Session::get('shop_id'));
            }else{ //administrator
                $sells  = Order::where('shop_id', Session::get('shop_id'));
            }

            //filter
            if((int)$filter_client_id>0) $sells = $sells->where('client_id',$filter_client_id);
            if(strlen($filter_campaign)>0) $sells = $sells->where('campaign_id',$filter_campaign);
            if(strlen($filter_pago)>0) $sells = $sells->where('payment',$filter_pago);
            if(strlen($filter_name_bank)>0) $sells = $sells->where('name_bank',$filter_name_bank);

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

            $sells = $sells->whereBetween('created_at',[$from,$to]);
            //if((int)$filter_check_flete==1) $sells = $sells->where('payment',$filter_check_flete);

            $sells =  $sells->where('status', 'Venta');

            //ventas totales
            $total_sell = $sells->count();
            $sum_sell = $sells->sum('total');
            $sum_sell_flete = $sells->value(DB::raw('SUM(total)'));
            $sum_sell_without_flete = $sells->value(DB::raw('SUM(total)-SUM(flete)'));
        }

        return response()->json(array(
            'total_sell' => isset($total_sell) ? $total_sell : 0,
            'sum_sell' => isset($sum_sell) ? $sum_sell : 0,
            'sum_sell_flete' => isset($sum_sell_flete) ? $sum_sell_flete : 0,
            'sum_sell_without_flete' => isset($sum_sell_without_flete) ? $sum_sell_without_flete : 0,
        ));

    }
    public function received(Request $request){

        $type = $request->input('status');
        $parent = $request->input('parent');

        if(!$parent && !backpack_user()->hasRole(['administrador'])){
            $parent = 'me';
        }

        if(strtolower($type)==='venta'){
            $data['title'] = 'Libro de ventas';
        }else{
            $data['title'] = 'Reservas recibidas';
        }

        $data['sell'] = true;


        $my_clients = [backpack_user()->client->id];

        if(strtolower($parent)=='me'){
            $clients =Client::where('parent_id',backpack_user()->id);
            $my_clients = array_merge($clients->pluck('id')->toArray(),$my_clients);
            $clients =  Client::whereIn('id',$my_clients)->where('shop_id',Session::get('shop_id'))->get();
        }else{
            $clients = Client::where('shop_id',Session::get('shop_id'))->get();
        }
        $data['clients'] = $clients;

        //generales
        $data['campaigns'] = Campaign::where('shop_id',Session::get('shop_id'))->where('active',1)->get();
        $data['max_campaing'] = Campaign::where('shop_id',Session::get('shop_id'))->where('active',1)->max('id');

        if(strtolower($type)=='venta'){
            $data['status'] = 'venta';

            $filter_client_id = $request->get('filter_client_id');
            $filter_campaign = $request->get('filter_campaign');
            $filter_pago = $request->get('filter_pago');
            $filter_name_bank = $request->get('filter_name_bank');
            $filter_date_from = $request->get('filter_date_from');
            $filter_date_to = $request->get('filter_date_to');
            $filter_check_flete = $request->get('filter_check_flete');

            if(strtolower($parent)=='me'){ //yo
                $sells  = Order::whereIn('client_id', $my_clients)->where('shop_id', Session::get('shop_id'));
            }else{ //administrator
                $sells  = Order::where('shop_id', Session::get('shop_id'));
            }

            //added by renatto vilcarromero 
            // $cliente = Client::find($filter_client_id);
            // $sons =Client::where('parent_id',$cliente->user_id);
            // $father_and_sons = array_merge($sons->pluck('id')->toArray(),array($filter_client_id));

            //filter
            if((int)$filter_client_id>0) $sells = $sells->where('client_id',$filter_client_id);
            //if((int)$filter_client_id>0) $sells = $sells->whereIn('client_id',$father_and_sons);
            if(strlen($filter_campaign)>0) $sells = $sells->where('campaign_id',$filter_campaign);
            if(strlen($filter_pago)>0) $sells = $sells->where('payment',$filter_pago);
            if(strlen($filter_name_bank)>0) $sells = $sells->where('name_bank',$filter_name_bank);

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

            $sells = $sells->whereBetween('created_at',[$from,$to]);
            //if((int)$filter_check_flete==1) $sells = $sells->where('payment',$filter_check_flete);

            $sells =  $sells->where('status', 'Venta');

        }else {
            $data['status'] = 'reserva';

            $filter_client_id = $request->get('filter_client_id');
            $filter_campaign = $request->get('filter_campaign');
            $filter_pago = $request->get('filter_pago');
            $filter_name_bank = $request->get('filter_name_bank');
            $filter_date_from = $request->get('filter_date_from');
            $filter_date_to = $request->get('filter_date_to');
            $filter_check_flete = $request->get('filter_check_flete');

            if(strtolower($parent)=='me') { //yo
                $sells = Order::whereIn('client_id', $my_clients)->where('shop_id', Session::get('shop_id'));
            }else{
                $sells = Order::where('shop_id', Session::get('shop_id'));
            }

            //filter
            if((int)$filter_client_id>0) $sells = $sells->where('client_id',$filter_client_id);
            if(strlen($filter_campaign)>0) $sells = $sells->where('campaign_id',$filter_campaign);
            if(strlen($filter_pago)>0) $sells = $sells->where('payment',$filter_pago);
            if(strlen($filter_name_bank)>0) $sells = $sells->where('name_bank',$filter_name_bank);

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

            $sells = $sells->whereBetween('created_at',[$from,$to]);
            //if((int)$filter_check_flete==1) $sells = $sells->where('payment',$filter_check_flete);

            $sells =  $sells->where('status', 'Reserva');
        }
        $sells = $sells->orderBy('created_at', 'desc')->get();

        if($request->ajax()){
            return datatables()->of($sells)
                ->addColumn('serie',function($row){
                    return '<a href="'.route('orders.show',$row->id).'">'.$row->serie.'</a>';
                })
                ->addColumn('client',function($q){
                    return $q->client->full_name;
                })
                ->addColumn('campaign',function($q){
                    return $q->campaign->name;
                })
                ->addColumn('actions',function($row) use($data) {
                    if($data['sell']){
                        if ($data['status'] == 'venta') {
                            return '<a class="btn btn-outline-secondary btn-sm" data - toggle = "tooltip" title = "Ver Venta" href = "'.route('orders.show',$row->id).'" ><i class="ti-eye" ></i ></a >
                                            <a class="btn btn-outline-secondary btn-sm" data - toggle = "tooltip" title = "Imprimir" target = "_blank" href = "'.route('orders.print',$row->id).'" ><i class="ti-printer" ></i ></a >';
                        }else{
                            return (backpack_user()->hasRole(['administrador','coord-ventas','ventas']) ? '<a class="btn btn-outline-secondary btn-sm" data - toggle = "tooltip" title = "Generar venta" href = "'.route('orders.sell',$row->id).'" ><i class="ti-shopping-cart" ></i ></a >' : '').
                                '<a class="btn btn-outline-secondary btn-sm" data - toggle = "tooltip" title = "Editar reserva" href = "'.route('orders.sell',['order'=>$row->id,'edit'=>true]).'" ><i class="ti-pencil" ></i ></a >'.
                                '<a class="btn btn-outline-secondary btn-sm" data - toggle = "tooltip" title = "Imprimir" target = "_blank" href = "'.route('orders.print',$row->id).'" ><i class="ti-printer" ></i ></a >'.
                                '<form method = "POST" action = "'.route('orders.destroy',$row->id).'" >'.
                                '<input type = "hidden" name = "_method" id = "_method" value = "DELETE" >'.csrf_field().
                                '<button data - toggle = "tooltip" title = "Anular Reserva" class="btn btn-outline-secondary btn-sm" type = "submit" class="" ><i class="ti-trash" ></i ></button >'.
                                '</form >';

                        }
                    }else{
                        return '<a class="text-muted font-16" data-toggle="tooltip" title="Ver Reserva" href="'.route('orders.show',$row->id).'"><i class="ti-eye"></i></a>';
                    }

                })
                ->rawColumns(['serie','actions'])
                ->toJson();
        }else{
            $data['reservas'] = $sells;
            return view('backoffice.orders.index',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['status'] = 'RESERVA';
        $data['shop_id'] = Session::get('shop_id');
        $data['products'] = Product::where('shop_id',Session::get('shop_id'))->where('active',true)->get();

        if(backpack_user()->hasRole(['administrador','ventas','coord-ventas'])){
            $data['clients'] = Client::where('shop_id',Session::get('shop_id'))->get();
        }else{
            $data['clients'] = Client::where('parent_id',backpack_user()->id)->get();
        }

        //$data['campaigns'] = Campaign::where('shop_id',Session::get('shop_id'))->where('active',true)->get();
        $data['fletes'] = Flete::where('shop_id',Session::get('shop_id'))->where('active',true)->orderBy('name')->get();
        $data['descuentos'] = Coupon::where('shop_id',Session::get('shop_id'))->where('active',true)->where('type_coupon','Formularios')->orderBy('value_min','asc')->get();
        $data['descuentos_oferta'] = Coupon::where('shop_id',Session::get('shop_id'))->where('active',true)->where('type_coupon','Ofertas')->get();
        return view('backoffice.orders.create',$data);
    }

    public function createSell()
    {
        $data['title'] = 'Generar venta';
        $data['status'] = 'Venta';
        $data['shop_id'] = Session::get('shop_id');
        $data['products'] = array();//Product::where('shop_id',Session::get('shop_id'))->where('active',true)->get();
        //todos los clientes
        $data['clients'] = Client::where('shop_id',Session::get('shop_id'))->get();

        $data['campaigns'] = Campaign::where('shop_id',Session::get('shop_id'))->where('active',true)->get();
        $data['fletes'] = Flete::where('shop_id',Session::get('shop_id'))->where('active',true)->get();
        $data['descuentos'] = Coupon::where('shop_id',Session::get('shop_id'))->where('active',true)->where('type_coupon','Formularios')->orderBy('value_min','asc')->get();
        $data['descuentos_oferta'] = Coupon::where('shop_id',Session::get('shop_id'))->where('active',true)->where('type_coupon','Ofertas')->get();
        return view('backoffice.orders.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
            //dd($request->all());
            $edit = $request->input('edit');

            //validar el stock antes de registrar
            $detalle_valid = $request->input('detalle',[]);
            foreach($detalle_valid as $item){
                $attr = AttributeProduct::find($item['id']);
                if($attr){
                    //validar tambien en la reserva -> para la reserva y venta.
                    if($request->input('status')=='RESERVA'){
                        //valida cuando esto sea una reserva
                        if($item['q']>($attr->stock - $attr->queque)){
                            return response()->json(array('stock' => ($attr->stock - $attr->queque) ,'message'=>'El producto "'.$attr->product->title.'" no tiene suficiente stock y/o estan reservados.','id' =>$attr->id),400);
                        }
                    }else{
                        // valida cuando este sea una venta
                        if($item['q']>$attr->stock - ($attr->queque - $item['q']) ){ //modified by rv
                            return response()->json(array('stock' => $attr->stock - $attr->queque,'message'=>'El producto "'.$attr->product->title.'" no tiene suficiente stock.','id' =>$attr->id),400);
                        }
                    }




                }
            }

            //si se esta editando
            if($edit){
                $order = Order::find($request->input('order_id'));
                $order->shop_id = Session::get('shop_id');
                $order->client_id = $request->input('client_id');

                //assig automatic
                $campaign_current = Campaign::where('shop_id',$order->shop_id)->orderBy('id','desc')->first();
                $order->campaign_id = $campaign_current->id;
                //end assing automatic

                $order->coupon_id = $request->input('coupon_id');
                $order->discount = $request->input('discount');
                $order->discount_offer = $request->input('discount_offer');
                $order->flete_address = $request->input('flete_address');
                $order->flete = $request->input('flete');
                $order->amount_discount_aditional = $request->input('amount_discount_aditional')?: 0;
                $order->amount_discount = $request->input('amount_discount')?: 0;
                $order->amount_discount_offer = $request->input('amount_discount_offer') ?: 0;
                $order->user_id = backpack_user()->id;
                $order->status = $request->input('status');
                $order->sub_total = $request->input('sub_total');
                $order->sub_total_offer = $request->input('sub_total_offer');
                $order->total = $request->input('total');
                $order->payment = $request->input('payment');
                $order->name_bank = $request->input('name_bank');
                $order->save();
            }else{
                $order = new Order();
                $order->shop_id = Session::get('shop_id');
                $order->client_id = $request->input('client_id');

                //assig automatic
                $campaign_current = Campaign::where('shop_id',$order->shop_id)->orderBy('id','desc')->first();
                $order->campaign_id = $campaign_current->id;
                //end assing automatic

                $order->coupon_id = $request->input('coupon_id');
                $order->discount = $request->input('discount');
                $order->discount_offer = $request->input('discount_offer');
                $order->flete_address = $request->input('flete_address');
                $order->flete = $request->input('flete');
                $order->amount_discount_aditional = $request->input('amount_discount_aditional')?: 0;
                $order->amount_discount = $request->input('amount_discount')?: 0;
                $order->amount_discount_offer = $request->input('amount_discount_offer') ?: 0;
                $order->user_id = backpack_user()->id;
                $order->status = $request->input('status');
                $order->sub_total = $request->input('sub_total');
                $order->sub_total_offer = $request->input('sub_total_offer');
                $order->total = $request->input('total');
                $order->payment = $request->input('payment');
                $order->name_bank = $request->input('name_bank');
                $order->save();

                //enviar correo
                if(strtolower($order->status)==='reserva'){
                    //Mail::to($order->shop->email)->send(new EmailReserva($order));
                }
            }

            //ahora el detalle

            if($edit){
                DetailOrder::where('order_id',$order->id)->delete();
                $detalle = $request->input('detalle',[]);

                foreach($detalle as $item){

                    $detail  = new DetailOrder();
                    $detail->order_id = $order->id;
                    $detail->product_id = $item['product']['id'];
                    $detail->attribute_id = $item['id'];
                    $detail->q = (int)$item['q'];
                    $detail->price = (float)$item['product']['price'];
                    $detail->price_sale = (float)$item['product']['price_sale'];
                    $detail->unit = 'UND';
                    $detail->gift = $item['gift']==="true" ? 1 : 0;
                    $detail->save();


                    //disminuir stock
                    if($order->status=='Venta'){
                        if($detail){
                            $reduce_stock = AttributeProduct::find($detail->attribute_id);
                            if($reduce_stock){
                                $reduce_stock->stock  = $reduce_stock->stock - $detail->q;
                                $reduce_stock->save();

                                //reducimos el stock
                                Inventary_product::create([
                                    'shop_id' => $reduce_stock->shop_id,
                                    'product_id' => $reduce_stock->product_id,
                                    'attribute_product_id' => $detail->attribute_id,
                                    'type' => 'SALIDA',
                                    'q' => $detail->q,
                                    'description' => 'Compra realizada por cajero'

                                ]);
                            }
                        }
                    }

                }
            }else{
                $detalle = $request->input('detalle',[]);
                foreach($detalle as $item){
                    $detail  = new DetailOrder();
                    $detail->order_id = $order->id;
                    $detail->product_id = $item['product']['id'];
                    $detail->attribute_id = $item['id'];
                    $detail->q = (int)$item['q'];
                    $detail->price = (float)$item['product']['price'];
                    $detail->price_sale = (float)$item['product']['price_sale'];
                    $detail->unit = 'UND';
                    $detail->gift = $item['gift']==="true" ? 1 : 0;
                    $detail->save();

                    //disminuir stock
                    if($order->status=='Venta'){
                        if($detail){
                            $reduce_stock = AttributeProduct::find($detail->attribute_id);
                            if($reduce_stock){
                                $reduce_stock->stock  = $reduce_stock->stock - $detail->q;
                                $reduce_stock->save();

                                //reducimos el stock
                                Inventary_product::create([
                                    'shop_id' => $reduce_stock->shop_id,
                                    'product_id' => $reduce_stock->product_id,
                                    'attribute_product_id' => $detail->attribute_id,
                                    'type' => 'SALIDA',
                                    'q' => $detail->q,
                                    'description' => 'Compra realizada por cajero'

                                ]);
                            }
                        }
                    }

                }

                //se cierra la reserva
                $order_id = $request->get('order_id');
                $order_before = Order::find($order_id);
                if($order_before){
                    $order_before->status = 'Cerrado';
                    $order_before->save();
                }
            }





            return response()->json($order);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Order $order)
    {
        $data['order'] = $order;
        if($request->ajax()){
            return response()->json($order);
        }else{
            return view('backoffice.orders.show',$data);
        }

    }

    public function sell(Order $order,$edit=false)
    {
        if(strtolower($order->status)!='reserva'){
            return redirect(route('orders.received'));
        }
        $data['order'] = $order;

        $data['title'] = $edit ? "Editar $order->status" : 'Generar venta';

        $data['status'] = $edit ? $order->status : 'Venta';
        $data['sell'] = $edit ? false :  true;
        $data['edit'] = $edit ? true : false;
        $data['shop_id'] = Session::get('shop_id');
        $data['products'] = Product::where('shop_id',Session::get('shop_id'))->where('active',true)->get();
        //$data['clients'] = Client::where('shop_id',Session::get('shop_id'))->get();
        if(backpack_user()->hasRole(['administrador','ventas','coord-ventas'])){
            $data['clients'] = Client::where('shop_id',Session::get('shop_id'))->get();
        }else{
            $data['clients'] = Client::where('parent_id',backpack_user()->id)->get();
        }
        
        $data['campaigns'] = Campaign::where('shop_id',Session::get('shop_id'))->where('active',true)->get();
        $data['fletes'] = Flete::where('shop_id',Session::get('shop_id'))->where('active',true)->get();
        $data['descuentos'] = Coupon::where('shop_id',Session::get('shop_id'))->where('active',true)->where('type_coupon','Formularios')->orderBy('value_min','asc')->get();
        $data['descuentos_oferta'] = Coupon::where('shop_id',Session::get('shop_id'))->where('active',true)->where('type_coupon','Ofertas')->get();

        return view('backoffice.orders.create',$data);

    }

    public function print(Order $order){
        $data['title'] = "Detalle : $order->status";
        $data['order'] = $order;
        $pdf = \PDF::loadView('backoffice.orders.print',$data);
        return $pdf->stream("$order->status-detalle.pdf");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $reserva = false;
        if(strtolower($order->status)=='reserva'){
            $reserva = true;
        }

        $order->update(['status'=>'Anulado']);
        if($reserva){
            return redirect(route('orders.received'));
        }else{
            return redirect(route('orders.index'));
        }
    }
}
