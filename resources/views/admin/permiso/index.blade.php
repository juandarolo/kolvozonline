@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Listado de permisos</div>
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
                        {!! Form::open(['route' => 'permisos.create', 'method' => 'GET']) !!}
                                <button type="submit" class="btn btn-primary">Nuevo Permiso</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Modulo</th>
                                <th>Usuario</th>
                                <th>Herramientas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permiso as $permisos)
                                <tr>
                                    <td>{{ $permisos->modulos->mod_nombre }}</td>
                                    <td>{{ $permisos->users->name }}</td>
                                    <td>
                                        <a href="{{ route('permisos.edit', $permisos->id) }}" class="btn btn-warning">Editar
                                             <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                        </a> 
                                    </td>

                                    <td> 
                                    <form action="{{ route('permisos.destroy',$permisos->id) }}" method="POST">                        
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Desea eliminar el permiso');">Eliminar</button>
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
