<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BackpackUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function assignRoleAdmin(){
        backpack_user()->assignRole('administrador');

        return response()->json(['message' => 'usuario asignado al rol administrador.']);
    }

    
}
