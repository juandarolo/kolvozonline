@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               
                <div class="panel-heading">Crear Modulo</div>
                
                               <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('modulos.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('mod_nombre') ? ' has-error' : '' }}">
                            <label for="mod_nombre" class="col-md-4 control-label">Nombre del Modulos</label>

                            <div class="col-md-6">
                                {!! Form::text('mod_nombre',null,['class' => 'form-control','placeholder' => 'Nombre','required'])!!}

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
                                <input type="file" name="imagen">
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('mod_url') ? ' has-error' : '' }}">
                            <label for="mod_url" class="col-md-4 control-label">Modulo Url</label>
                            <div class="col-md-6">
                                {!! Form::text('mod_url',null,['class' => 'form-control','placeholder' => 'Enlace Del Modulo','required'])!!}

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
                                {!! Form::label('mod_visible','SI: ') !!}
                                {!! Form::radio('mod_visible', 1, true) !!}
                                {!! Form::label('mod_visible','NO: ') !!}
                                {!! Form::radio('mod_visible', 0) !!}

                                @if ($errors->has('mod_visible'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mod_visible') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
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


  
