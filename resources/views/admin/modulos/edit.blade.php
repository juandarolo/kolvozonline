@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Modulo</div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['modulos.update', $modulos],'method' => 'PUT','files'=>true ]) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('mod_nombre') ? ' has-error' : '' }}">
                            <label for="mod_nombre" class="col-md-4 control-label">Nombre del Modulos</label>

                            <div class="col-md-6">
                                {!! Form::text('mod_nombre',$modulos->mod_nombre,['class' => 'form-control','placeholder' => 'Nombre','required'])!!}

                                @if ($errors->has('mod_nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mod_nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                        <strong>Imagen:</strong>
                                        <input type="text" value="{{ $modulos->mod_img }}" class="form-control" readonly><br>
                                        <input type="file" name="imagen">
                                </div>
                        </div>

                        <div class="form-group{{ $errors->has('mod_url') ? ' has-error' : '' }}">
                            <label for="mod_url" class="col-md-4 control-label">Modulo Url</label>
                            <div class="col-md-6">
                                {!! Form::text('mod_url',$modulos->mod_url,['class' => 'form-control','placeholder' => 'Enlace Del Modulo','required'])!!}

                                @if ($errors->has('mod_url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mod_url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('mod_visible') ? ' has-error' : '' }}">
                            <label for="mod_visible" class="col-md-4 control-label">Visible:</label>
                            <div class="col-md-6">
                                @if($modulos->mod_visible == 1)
                                    {!! Form::label('mod_visible','SI: ') !!}
                                    {!! Form::radio('mod_visible', 1, true) !!}
                                    {!! Form::label('mod_visible','NO: ') !!}
                                    {!! Form::radio('mod_visible', 0) !!}
                                @else
                                    {!! Form::label('mod_visible','SI: ') !!}
                                    {!! Form::radio('mod_visible', 1) !!}
                                    {!! Form::label('mod_visible','NO: ') !!}
                                    {!! Form::radio('mod_visible', 0, true) !!}
                                @endif

                                @if ($errors->has('mod_visible'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mod_visible') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Actualizar',['class' => 'btn btn-primary']) !!}
                                <button type="button" class="btn btn-primary" onClick=location.href="{{ route('modulos.index') }}" >       Consultar
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


  
