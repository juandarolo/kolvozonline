@extends('layouts.app')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        {!! Form::open(['route' => 'roles.create', 'method' => 'GET']) !!}
                                <button type="submit" class="btn btn-primary">Nuevo rol</button>
                        {!! Form::close() !!}
                    </div>
<table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>HERRAMIENTAS</th>
    </thead>
    <tbody>
        @foreach($roles as $rol)
            <tr>
                <td>{{ $rol->id }}</td>
                <td>{{ $rol->rol_nombre }}</td>
                <td>
                <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-warning">Editar<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                
                <td> 
                                        <form action="{{ route('roles.destroy',$rol->id) }}" method="POST">                        
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Desea eliminar el rol');">Eliminar</button>
                                        </form>
                                    </td>
            </tr>
        @endforeach
        {{ $roles->links() }}
    </tbody>

</table>
@stop
