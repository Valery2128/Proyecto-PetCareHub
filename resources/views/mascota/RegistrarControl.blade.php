@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
    
<div class="card-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Registrar controles con profesionales de la salud - {{$mascota->nombre}}</h3>
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
            <label for="nameInput">Tipo de profesional<strong class="text-danger">*</strong></label>
            <select value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" id="nameInput">
                   <option value="Veterinario General">Veterinario General</option>
                   <option value="Veterinario Especialista">Veterinario Especialista</option>
                   <option value="Técnico Veterinario">Técnico Veterinario</option>
                   <option value="Asistente Veterinario">Asistente Veterinario</option>
                   <option value="Auxiliar de Enfermería Veterinaria (AEV)">Auxiliar de Enfermería Veterinaria (AEV)</option>
                   <option value="Especialista en Comportamiento Animal">Especialista en Comportamiento Animal</option>
                   <option value="Especialista en Nutrición Animal">Especialista en Nutrición Animal</option>
                   <option value="Farmacéutico Veterinario">Farmacéutico Veterinario</option>
                   <option value="Especialista en Rehabilitación Animal">Especialista en Rehabilitación Animal</option>
                   <option value="Especialista en Imagenología">Especialista en Imagenología</option>
                   <option value="Anestesiólogo Veterinario">Anestesiólogo Veterinario</option>
                   <option value="Especialista en Odontología Veterinaria">Especialista en Odontología Veterinaria</option>
                   <option value="Patólogo Veterinario">Patólogo Veterinario</option>
                   <option value="Especialista en Animales Exóticos">Especialista en Animales Exóticos</option>
                   <option value="Administrador">Administrador</option>
                   <option value="Personal de Recepción">Personal de Recepción</option>
                   <option value="Personal de Limpieza y Mantenimiento">Personal de Limpieza y Mantenimiento</option>
                   <option value="Especialista en Cuidado de Urgencias">Especialista en Cuidado de Urgencias</option>
                </select>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="dateInput">Fecha del control<strong class="text-danger">*</strong></label>
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
        <div class="form-group">
            <label for="nameInput">Nombre del profesional<strong class="text-danger">*</strong></label>
            <input value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" id="nameInput">
        </div>
        
        <div class="form-group">
            <label for="emailInput">Observaciones<strong class="text-danger">*</strong></label>
            <textarea rows="3" class="form-control @error('description') is-invalid @enderror" name="description"
                      id="descriptionInput" resize="none">{{old('description')}}</textarea>
        </div>
        <div class="row mx-auto">
            <button type="submit" class="btn btn-outline-success">Registrar control</button>
        </div>

    </form>
</div>

</div>
</div>
@endsection
