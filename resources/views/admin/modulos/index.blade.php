@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Listado de modulos</div>
                <div class="panel-body text-right">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="panel-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                        </div>
                        </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        {!! Form::open(['route' => 'modulos.create', 'method' => 'GET']) !!}
                                <button type="submit" class="btn btn-primary">Nuevo Modulo</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Url</th>
                                <th>Visible</th>
                                <th>Imagen</th>
                                <th>Herramientas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($modulos as $modulo)
                                <tr>
                                    <td>{{ $modulo->mod_nombre }}</td>
                                    <td>{{ $modulo->mod_url }}</td>
                                    @if ($modulo->mod_visible  == '1')
                                        <td>Activo</td>
                                    @else
                                        <td>Inactivo</td>
                                    @endif
                                    <td>
                                        <img class="img-rounded" width="70" height="90" src="storage/{{ $modulo->mod_img }}" alt="image">
                                     <td>
                                    <td>
                                        <a href="{{ route('modulos.edit', $modulo->id) }}" class="btn btn-warning">Editar
                                             <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                        </a> 
                                      
                                    </td>

                                    <td> 
                                        <form action="{{ route('modulos.destroy',$modulo->id) }}" method="POST">                        
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Desea eliminar el modulo');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table> 

                 </div>
        </div>
    </div>
</div>
@stop
