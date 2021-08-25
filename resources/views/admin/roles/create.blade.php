@extends('layouts.app')

@section('content')


{!! Form::open(['route' => 'roles.store','method' => 'POST']) !!}
    {!! csrf_field() !!}
    <div class="col-lg-8">
	    <table class="table table-bordered table-hover">
	    	<tr>
	    		<td style="text-align: center;vertical-align:middle;"> Nombre: </td>
	    		<td>
				    <div class='form-group'>
				     {!! Form::text('rol_nombre',null,['class' => 'form-control','placeholder' => 'Nombre Rol','required'])!!}
				    </div>
			    </td>
			</tr>
			<tr>
				<td style="text-align: center;vertical-align:middle;" colspan="2">
					<div class='form-group'>
				     {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
				    </div>
			    </td>
			</tr>
	    </table>
    </div>

{!! Form::close() !!}

@stop
