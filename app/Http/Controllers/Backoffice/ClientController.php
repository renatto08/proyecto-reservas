<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\BackpackUser;
use App\Models\Client;
use App\Models\ShopUser;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['clients'] = [];

        if($request->ajax()){
            if(backpack_user()->hasRole(['administrador','coord-ventas','ventas'])){
                $clients = Client::where('id','!=',backpack_user()->id)->get();
            }else{
                $clients = Client::where('parent_id',backpack_user()->id)->get();
            }
        
            return datatables()->of($clients)
                ->addColumn('email',function ($row){
                    return $row->user->email;
                })
                ->addColumn('usuario',function($row){
                    //return '<img class="img-circle mr-3" src="'.asset('themes/adminca-8/img/users/u6.jpg').'" alt="image" width="40" />'.$row->user->username;
                    return $row->user->username;
                })
                ->addColumn('actions',function($client){
                    return '<a data-user_id="'.$client->user_id.'" data-id="'.$client->id.'" data-email="'.$client->user->email.'" data-name="'.$client->first_name.'" data-last="'.$client->last_name.'" data-city="'.$client->city.'" data-address="'.$client->address.'" class="text-light font-16 edit-modal" href="'.route('clients.edit',['client'=>$client->id]).'"><i class="fa fa-edit"></i></a>';
                })
                ->rawColumns(['usuario','actions'])
                ->toJson();
        }else{
            return view('backoffice.clients.index',$data);
        }
    }

    public function search(Request $request){
        $q = $request->get('term','');
        if(backpack_user()->hasRole(['administrador','ventas','coord-ventas'])){
            $clients = Client::select(DB::raw("CONCAT(first_name,' ',last_name) as text,id"))->where(DB::raw("CONCAT(first_name,' ',last_name)"),'like',$q.'%')->where('shop_id',Session::get('shop_id'))->get();
        }else{
            $clients = Client::select(DB::raw("CONCAT(first_name,' ',last_name) as text,id"))->where(DB::raw("CONCAT(first_name,' ',last_name)"),'like',$q.'%')->where('parent_id',backpack_user()->id)->where('shop_id',Session::get('shop_id'))->get();
        }
        return response()->json(['results' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'code' => 'required|unique:users,username',
            'email' => 'required|unique:users',
        ]);


        //create user cliente
        $user = new BackpackUser();
        $user->name = $request->input('first_name') ." ". $request->input('last_name');
        $user->username = $request->input('code');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->save();

        if(backpack_user()->hasRole(['lider','administrador','negocio'])){
            $user->assignRole('empresaria');
        }else{
            $user->assignRole('cliente');
        }

        //create client
        $client = new Client();
        $client->shop_id = Session::get('shop_id');
        $client->user_id = $user->id;
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->birthdate = $request->input('birthdate');
        $client->code = $request->input('code');
        $client->city = $request->input('city','LIMA');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone') ? $request->input('phone') : '-';
        $client->parent_id = backpack_user()->id;
        $client->save();

        //assoc tienda
        $tienda = new ShopUser();
        $tienda->shop_id =Session::get('shop_id');
        $tienda->user_id = $user->id;
        $tienda->save();
        
        event(new Registered($user));
        return Redirect::route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $user = User::find($request->input('user_id'));
        $user->update(['email' => $request->input('email')]);
        $client->update($request->all());
        return response()->json(['message' => 'Cliente actualizado.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
