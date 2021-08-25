<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulo;
use App\Models\Permiso;

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
        $modulos_menu = Modulo::orderBy('mod_nombre')->get(); 
        $modulos_menu->each(function($modulos_menu){
            $modulos_menu->permisos;
        }); 
        //dd($modulos_menu);
        return view('home')
        ->with('modulos_menu', $modulos_menu);
    }
}
