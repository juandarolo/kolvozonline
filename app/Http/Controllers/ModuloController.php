<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Modulo;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::orderBy('id','ASC')->paginate(10);
         return View("admin.modulos.index")
            ->with('modulos', $modulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modulo =new Modulo;
        $modulo->mod_nombre         = $request->mod_nombre;
        $modulo->mod_url            = $request->mod_url;
        $modulo->mod_visible        = $request->mod_visible;

        if ($request->hasFile('imagen')){
            $file           = $request->file("imagen");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("storage/"),$nombrearchivo);
            $modulo->mod_img        = $nombrearchivo;
        }

        $modulo->save();

     
        return redirect()->route('modulos.index')
                        ->with('success','El modulo se creo correctamente.');         
              
            
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
        $modulos = Modulo::find($id);
        return View('admin.modulos.edit')
            ->with('modulos',$modulos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modulo $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
        if ($request->hasFile('imagen')){
            $file           = $request->file("imagen");
            $nombrearchivo  = $file->getClientOriginalName();
            $file->move(public_path("storage/"),$nombrearchivo);
        }
    
        $modulo->update($request->all());

        $modulo->where('id',$modulo->id)
                ->update(['mod_img'=> $nombrearchivo]);

        return redirect()
            ->route('modulos.index')
            ->with("nessage", "Se actualizo el modulo correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modulos = Modulo::find($id);
        $modulos->delete();

        return redirect()
            ->route('modulos.index')
            ->with("message", "Se elimino el modulo correctamente");
    }
}
