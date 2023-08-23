@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="display-1 text-center">{{$mascota->nombre}}</h1>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body p-5">
                    <h1 class="text-center">{{count($condiciones)}}</h1>
                    <h4 class="text-center mt-2">Condiciones de salud</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body p-5">
                    <h1 class="text-center">{{count($indicadores)}}</h1>
                    <h4 class="text-center mt-2">Indicadores</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body p-5">
                    <h1 class="text-center">{{count($veterinarios)}}</h1>
                    <h4 class="text-center mt-2">Procedimientos veterinarios</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body p-5">
                    <h1 class="text-center">0</h1>
                    <h4 class="text-center mt-2">Controles</h6>
                </div>
            </div>
        </div>
        

        <div class="row mt-4">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" data-toggle="tab" href="#nav-salud" role="tab" aria-selected="true">Condiciones de salud</a>
                  <a class="nav-item nav-link" data-toggle="tab" href="#nav-indicadores" role="tab" aria-selected="false">Indicadores de salud</a>
                  <a class="nav-item nav-link" data-toggle="tab" href="#nav-procedimientos" role="tab" aria-selected="false">Procedimientos veterinarios</a>
                  <a class="nav-item nav-link" data-toggle="tab" href="#nav-seguimiento" role="tab" aria-selected="false">Seguimiento a condiciones</a>
                  <a class="nav-item nav-link" data-toggle="tab" href="#nav-accidentes" role="tab" aria-selected="false">Accidentes o enfermedades</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-salud" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table id="events" class="table table-bordered" aria-label="Eventos">
                        <thead>
                        <tr>
                            <th scope="col" title="Ordenar por orden de creación">#</th>
                            <th scope="col" title="Ordenar por nombre">Tipo de condición</th>
                            <th scope="col" title="Ordenar por descripción">Descripción</th>
                            <th scope="col" title="Ordenar por valor de decoración">Fecha de registro</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--table content--}}
                        @foreach($condiciones as $condicion)
                            <tr>
                                <td>{{$condicion->id}}</td>
                                <td>{{Str::limit($condicion->tipo_condicion, 25)}}</td>
                                <td title="{{$condicion->descripcion}}">{{Str::limit($condicion->descripcion, 25)}}</td>
                                <td>{{$condicion->fecha_registro}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-indicadores" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table id="events" class="table table-bordered" aria-label="Eventos">
                        <thead>
                        <tr>
                            <th scope="col" title="Ordenar por orden de creación">#</th>
                            <th scope="col" title="Ordenar por nombre">Tipo de indicador</th>
                            <th scope="col" title="Ordenar por descripción">Valor</th>
                            <th scope="col" title="Ordenar por valor de decoración">Fecha de registro</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--table content--}}
                        @foreach($indicadores as $indicador)
                            <tr>
                                <td>{{$indicador->id}}</td>
                                <td>{{Str::limit($indicador->tipo_indicador, 25)}}</td>
                                <td title="{{$indicador->valor}}">{{Str::limit($indicador->valor, 25)}}</td>
                                <td>{{$indicador->fecha_registro}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-procedimientos" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <table id="events" class="table table-bordered" aria-label="Eventos">
                        <thead>
                        <tr>
                            <th scope="col" title="Ordenar por orden de creación">#</th>
                            <th scope="col" title="Ordenar por nombre">Tipo de procedimiento</th>
                            <th scope="col" title="Ordenar por descripción">Resultado</th>
                            <th scope="col" title="Ordenar por valor de decoración">Fecha de procedimiento</th>
                            <th scope="col" title="Ordenar por valor de decoración">Imagen</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--table content--}}
                        @foreach($veterinarios as $procedimiento)
                            <tr>
                                <td>{{$procedimiento->id}}</td>
                                <td>{{Str::limit($procedimiento->tipo_procedimiento, 25)}}</td>
                                <td title="{{$procedimiento->resultado}}">{{Str::limit($procedimiento->resultado, 25)}}</td>
                                <td>{{$procedimiento->fecha_procedimiento}}</td>
                                <td> <a target="_blank" class="btn btn-link" href="{{$procedimiento->imagen_url}}"> <i class="fa-solid fa-camera"></i> &nbsp; Ver imagen</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-seguimiento" role="tabpanel" aria-labelledby="nav-profile-tab"></div>
                <div class="tab-pane fade" id="nav-accidentes" role="tabpanel" aria-labelledby="nav-profile-tab"></div>
              </div>
        </div>
    </div>
</div>
@endsection
