@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modulos Activos</div>

                <div class="card-body bg-primary">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            @foreach($modulos_menu as $menu)
                                @foreach($menu->permisos as $permisos)
                                    @if ($permisos->users_id  === Auth::user()->id)

                                    <div class="col-xl-4 imagenes"> 
                                        <a href="{{ $menu->mod_url }}" target="_blank">
                                            <img src="storage/{{ $menu->mod_img }}"> 
                                        </a>
                                       
                                    </div>   
    
  
                      
                                        

                                                                 
                                    @endif                              
                                @endforeach  
                            @endforeach 
                        </div>   
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
