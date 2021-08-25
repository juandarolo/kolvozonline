<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Permiso;
use App\Models\Modulo;
use App\Models\User;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permiso::orderBy('id','ASC')->paginate(10);
         return View("admin\permiso\index")
            ->with('permiso', $permisos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permimodulos    = Modulo::orderby('mod_nombre','ASC')->pluck('mod_nombre','id');
        $permiuser    = User::orderby('name','ASC')->pluck('name','id');
        return View('admin.permiso.create')
        ->with('permimodulos', $permimodulos)
        ->with('permiuser', $permiuser);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $permiso =new Permiso;
        $permiso->modulos_id    = $request->modulos_id;
        $permiso->users_id      = $request->users_id;

        $permiso->save();
        return redirect()->route('permisos.index')
            ->with("message", "Se creo el permiso correctamente");
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
        $permisos = Permiso::find($id);
        $permisos->modulos;
        $permisos->users;
        $modulo = Modulo::orderby('mod_nombre','ASC')->pluck('mod_nombre','id');
        $usuario = User::orderby('name','ASC')->pluck('name','id');
        return View('admin\permiso\edit')
            ->with('permiso',$permisos)
            ->with('modulo',$modulo)
            ->with('usuario',$usuario);
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
        $permisos = Permiso::find($id);
        $permisos->fill($request->all());
        $permisos->save();

        return redirect()
            ->route('permisos.index')
            ->with("message", "Se actualizo el modulo correctamente");
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permiso $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permiso $permiso)
    {
       
        $permiso->delete();

        return redirect()
            ->route('permisos.index')
            ->with( "message", "Se elimino el permiso correctamente");
    }
}
