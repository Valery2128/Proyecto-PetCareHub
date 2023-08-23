@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    @foreach(auth()->user()->mascotas as $key => $value)
        <div class="col-md-4">
            <div class="card w-100">
                <img class="card-img-top" style="max-height: 345px;" src="https://plus.unsplash.com/premium_photo-1677545182067-26ac518ef64f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2156&q=80" alt="Card image cap">
                <div class="card-body">
                            <h2 class="card-title text-center">
                                {{$value->nombre}} 
                                <span class=" badge badge-pill badge-primary">{{$value->tipo_mascota}}</span>
                                    
                                    <a class="btn text-info" data-toggle="collapse" data-target="#{{$key}}" aria-expanded="true" aria-controls="{{$key}}">
                                        <i class="fa-solid fa-circle-info"></i>  Más información
                                    </a>
                                    <button class="btn text-end" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical fa-xl"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      <a class="dropdown-item" href="/view/registrarsalud/{{$value->id}}" type="button">Registrar condicion de salud</a>
                                      <a class="dropdown-item" href="/view/registrarveterinario/{{$value->id}}" type="button">Registrar procedimiento veterinario</a>
                                      <a class="dropdown-item" href="/view/registrarindicador/{{$value->id}}" type="button">Registrar indicadores de salud</a>
                                      <a class="dropdown-item" href="/view/registrarcontrol/{{$value->id}}" type="button">Registrar control con profesional</a>
                                      <a class="dropdown-item" href="/view/registrarseguimiento/{{$value->id}}" type="button">Registrar seguimiento condición</a>
                                      <a class="dropdown-item" href="/view/reportes/{{$value->id}}" type="button">Reportes</a>
                                    </div>
                            </h2>
                                


                    <div class="text-end mb-2">
                        
                    </div>

                    <div id="{{$key}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <table class="table bg-white">
                            <tbody>
                                <tr>
                                    <td class="bg-white">Edad:</td>
                                    <td class="bg-white">{{$value->edad}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-white">Rasgos fisicos:</td>
                                    <td class="bg-white">{{$value->rasgos_fisicos}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-white">Tipo de alimento:</td>
                                    <td class="bg-white">{{$value->tipo_alimento}}</td>
                                </tr>
                                <tr>
                                    <td class="bg-white">Recomendaciones medicas:</td>
                                    <td class="bg-white">{{$value->recomendaciones_medicas}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @endforeach

        {{-- <div class="col-md-4">
            <a class="card w-100 h-100 hover-zoom btn btn-secondary" href="/mascota" style="cursor: pointer;">
                <img class="card-img-top m-auto" style="max-height: 345px; max-width: 345px;" src="https://cdn1.iconfinder.com/data/icons/animals-95/300/cat-add-animal-pet-wild-domestic-512.png" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title text-center text-black">Agregar mascota</h2>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
