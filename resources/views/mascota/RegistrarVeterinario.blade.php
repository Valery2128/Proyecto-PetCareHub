@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
    
<div class="card-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Registrar procedimientos veterinarios - {{$mascota->nombre}}</h3>
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
        <div class="form-group">
            <label for="nameInput">Tipo de procedimientos<strong class="text-danger">*</strong></label>
            <select value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" id="nameInput">
                   <option value="Vacunación">Vacunación</option>
                   <option value="Esterilización/Neutro">Esterilización/Neutro</option>
                   <option value="Cirugía Electiva">Cirugía Electiva</option>
                   <option value="Cirugía de Emergencia">Cirugía de Emergencia</option>
                   <option value="Limpieza Dental">Limpieza Dental</option>
                   <option value="Extracción Dental">Extracción Dental</option>
                   <option value="Cirugía Ortopédica">Cirugía Ortopédica</option>
                   <option value="Cirugía Oftálmica">Cirugía Oftálmica</option>
                   <option value="Cirugía Cardiaca">Cirugía Cardiaca</option>
                   <option value="Endoscopia">Endoscopia</option>
                   <option value="Colonoscopia">Colonoscopia</option>
                   <option value="Gastroscopia">Gastroscopia</option>
                   <option value="Cirugía de Tejidos Blandos">Cirugía de Tejidos Blandos</option>
                   <option value="Cirugía de Trauma">Cirugía de Trauma</option>
                   <option value="Cirugía de Tumores">Cirugía de Tumores</option>
                   <option value="Cirugía Reconstructiva">Cirugía Reconstructiva</option>
                   <option value="Radiografía">Radiografía</option>
                   <option value="Ecografía">Ecografía</option>
                   <option value="Tomografía Computarizada (TAC)">Tomografía Computarizada (TAC)</option>
                   <option value="Resonancia Magnética (RM)">Resonancia Magnética (RM)</option>
                   <option value="Endoscopia Digestiva">Endoscopia Digestiva</option>
                   <option value="Endoscopia Respiratoria">Endoscopia Respiratoria</option>
                   <option value="Endoscopia Urológica">Endoscopia Urológica</option>
                   <option value="Colonoscopia">Colonoscopia</option>
                   <option value="Gastroscopia">Gastroscopia</option>
                   <option value="Electrocardiograma (ECG)">Electrocardiograma (ECG)</option>
                   <option value="Ecocardiografía">Ecocardiografía</option>
                   <option value="Análisis de Sangre">Análisis de Sangre</option>
                   <option value="Análisis de Orina">Análisis de Orina</option>
                   <option value="Endoscopia">Endoscopia</option>
                   <option value="Terapia Física y Rehabilitación">Terapia Física y Rehabilitación</option>
                   <option value="Tratamiento de Heridas">Tratamiento de Heridas</option>
                   <option value="Terapia de Comportamiento">Terapia de Comportamiento</option>
                 </select>
        </div>
        <div class="form-group">
            <label for="nameInput">Resultado<strong class="text-danger">*</strong></label>
            <input value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" id="nameInput">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="dateInput">Fecha del procedimiento<strong class="text-danger">*</strong></label>
                    <div class="input-group input-group-alternative">
                        <input value="{{old('startDate', date('Y-m-d'))}}" type="date"
                               class="form-control @error('startDate') is-invalid @enderror datepicker"
                               name="startDate"
                               id="date" data-date-language="es" data-date-format="yyyy-mm-dd"
                               data-date-start-date="{{date('Y-m-d')}}"
                               data-date-end-date="+60d">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Selecciona una imagen de evidencia</label>
            <input class="form-control @error('image') is-invalid @enderror" value="{{old('image')}}" name="image"
                   type="file" id="formFile">
        </div>
        <div class="row mx-auto">
            <button type="submit" class="btn btn-outline-success">Registrar procedimiento</button>
        </div>

    </form>
</div>

</div>
</div>
@endsection
