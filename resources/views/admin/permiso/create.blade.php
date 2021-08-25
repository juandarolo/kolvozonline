@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crear permiso
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('permisos.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('modulos_id') ? ' has-error' : '' }}">
                            <label for="modulos_id" class="col-md-4 control-label">Modulo: </label>
                            <div class="col-md-6">
                                 {!! Form::select('modulos_id', $permimodulos, null, ['class' => 'form-control','placeholder' => 'Seleccione una opciòn','required'] )!!}

                                @if ($errors->has('modulos_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modulos_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('users_id') ? ' has-error' : '' }}">
                            <label for="users_id" class="col-md-4 control-label">Usuario: </label>
                            <div class="col-md-6">
                                 {!! Form::select('users_id', $permiuser, null, ['class' => 'form-control','placeholder' => 'Seleccione una opciòn','required'] )!!}

                                @if ($errors->has('users_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('users_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                                <button type="button" class="btn btn-primary" onClick=location.href="{{ route('permisos.index') }}" >       Consultar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


  
