@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
    
<div class="card-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Registrar condición de salud - {{$mascota->nombre}}</h3>
        </div>
        <div class="col text-right">
            <a href="{{url('/home')}}" class="btn btn-sm btn-outline-danger">
                Regresar
            </a>
        </div>
    </div>
</div>
<div class="card-body">
    <form action="{{url('registrarsalud')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$mascota->id}}" name="id">
        <div class="form-group">
            <label for="nameInput">Tipo de condicion<strong class="text-danger">*</strong></label>
            <select value="{{old('tipo_condicion')}}" type="text" class="form-control @error('tipo_condicion') is-invalid @enderror"
                   name="tipo_condicion" id="tipo_condicion">
                   <option value="Enfermedades Infecciosas">Enfermedades Infecciosas</option>
                   <option value="Lesiones Traumáticas">Lesiones Traumáticas</option>
                   <option value="Problemas Respiratorios">Problemas Respiratorios</option>
                   <option value="Problemas Cardiovasculares">Problemas Cardiovasculares</option>
                   <option value="Problemas Gastrointestinales">Problemas Gastrointestinales</option>
                   <option value="Problemas Renales">Problemas Renales</option>
                   <option value="Problemas Hepáticos">Problemas Hepáticos</option>
                   <option value="Problemas Endocrinos">Problemas Endocrinos</option>
                   <option value="Problemas Neurológicos">Problemas Neurológicos</option>
                   <option value="Problemas Musculoesqueléticos">Problemas Musculoesqueléticos</option>
                   <option value="Problemas Dermatológicos">Problemas Dermatológicos</option>
                   <option value="Problemas Oftalmológicos">Problemas Oftalmológicos</option>
                   <option value="Problemas Dentales">Problemas Dentales</option>
                   <option value="Ninguna Enfermedad">Ninguna Enfermedad</option>
                   <option value="Bajo de peso">Bajo de peso</option>
                   <option value="Sobre peso">Sobre peso</option>
                   <option value="Cáncer">Cáncer</option>
                   <option value="Problemas de Comportamiento">Problemas de Comportamiento</option>
                   <option value="Problemas Reproductivos">Problemas Reproductivos</option>
                   <option value="Enfermedades Parasitarias">Enfermedades Parasitarias</option>
                   <option value="Alergias">Alergias</option>
                   <option value="Obesidad">Obesidad</option>
                   <option value="Problemas de Tiroides">Problemas de Tiroides</option>
                   <option value="Enfermedades Virales">Enfermedades Virales</option></select>
        </div>
        <div class="form-group">
            <label for="emailInput">Descripción<strong class="text-danger">*</strong></label>
            <textarea rows="3" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"
                      id="descriptionInput" resize="none">{{old('descripcion')}}</textarea>
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
            <button type="submit" class="btn btn-outline-success">Registrar condición</button>
        </div>

    </form>
</div>

</div>
</div>
@endsection
