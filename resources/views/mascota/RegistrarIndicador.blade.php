@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
    
<div class="card-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Registrar indicadores de salud - {{$mascota->nombre}}</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('/home')}}" class="btn btn-sm btn-outline-danger">
                Regresar
            </a>
        </div>
    </div>
</div>
<div class="card-body">
    <form action="{{url('registrarindicador')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$mascota->id}}" name="id">
        <div class="form-group">
            <label for="nameInput">Tipo de indicador<strong class="text-danger">*</strong></label>
            <select value="{{old('tipo_indicador')}}" type="text" class="form-control @error('tipo_indicador') is-invalid @enderror"
                   name="tipo_indicador" id="nameInput">
                   <option value="Examen Físico">Examen Físico</option>
                   <option value="Control de Peso">Control de Peso</option>
                   <option value="Temperatura Corporal">Temperatura Corporal</option>
                   <option value="Frecuencia Cardíaca">Frecuencia Cardíaca</option>
                   <option value="Frecuencia Respiratoria">Frecuencia Respiratoria</option>
                   <option value="Presión Arterial">Presión Arterial</option>
                   <option value="Examen de Ojos">Examen de Ojos</option>
                   <option value="Examen de Oídos">Examen de Oídos</option>
                   <option value="Examen Dental">Examen Dental</option>
                   <option value="Análisis de Sangre">Análisis de Sangre</option>
                   <option value="Análisis de Orina">Análisis de Orina</option>
                   <option value="Radiografía">Radiografía</option>
                   <option value="Ecografía">Ecografía</option>
                   <option value="Endoscopia">Endoscopia</option>
                   <option value="Tomografía Computarizada (TAC)">Tomografía Computarizada (TAC)</option>
                   <option value="Resonancia Magnética (RM)">Resonancia Magnética (RM)</option>
                   <option value="Electrocardiograma (ECG)">Electrocardiograma (ECG)</option>
                   <option value="Ecocardiografía">Ecocardiografía</option>
                   <option value="Pruebas de Laboratorio Adicionales">Pruebas de Laboratorio Adicionales</option>
                 </select>
        </div>
        <div class="form-group">
            <label for="nameInput">Valor<strong class="text-danger">*</strong></label>
            <input value="{{old('valor')}}" type="text" class="form-control @error('valor') is-invalid @enderror"
                   name="valor" id="nameInput">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="dateInput">Fecha del registro<strong class="text-danger">*</strong></label>
                    <div class="input-group input-group-alternative">
                        <input value="{{old('fecha_registro', date('Y-m-d'))}}" type="date"
                               class="form-control @error('fecha_registro') is-invalid @enderror"
                               name="fecha_registro"
                               id="date" data-date-language="es" data-date-format="yyyy-mm-dd"
                               data-date-start-date="{{date('Y-m-d')}}"
                               data-date-end-date="+60d">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto">
            <button type="submit" class="btn btn-outline-success">Registrar indicador</button>
        </div>

    </form>
</div>

</div>
</div>
@endsection
