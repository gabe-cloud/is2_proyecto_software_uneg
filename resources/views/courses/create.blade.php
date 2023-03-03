@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@if(count($profesores)>=1 && count($carreras) >=1 && count($horarios) >=1 && count($secciones) >=1)
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card bg-secondary">
                    <div>
                        <h3>Menu de creación de nuevo curso</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Profesor:</strong>
                            <select name="professor_id" class="form-control">
                                @foreach($profesores as $profesor)
                                    <option value="{{$profesor->id}}"  selected >
                                        {{$profesor->datos->name}} {{$profesor->datos->last_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Seccion:</strong>
                            <select name="section_id" class="form-control">
                                @foreach($secciones as $seccion)
                                    <option value="{{$seccion->id}}"  selected >
                                        {{$seccion->section_number}} - {{$seccion->carrera->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Carrera:</strong>
                            <select name="career_id" class="form-control">
                                @foreach($carreras as $carrera)
                                    <option value="{{$carrera->id}}"  selected >
                                        {{$carrera->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Horario:</strong>
                            <select name="schedules_id" class="form-control">
                                @foreach($horarios as $horario)
                                    <option value="{{$horario->id}}"  selected >
                                        {{$horario->day}} - {{$horario->entry_time}} - {{$horario->departure_time}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <input type="text" name="course_type" class="form-control" placeholder="Tipo">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Número unidades de credito:</strong>
                            <input type="number" name="credit_units" class="form-control" placeholder="0">
                        </div>
                    </div>
                    <div class="text-center">
                            <a class="btn btn-primary" href="{{ route('courses.index') }}"> Atras</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
<div class="container">
    <h1>No es posible crear una Materia ya que hacen falta datos importantes como lo son: </h1>
    <p>Crear Horarios</p>
    <p>Crear Secciones</p>
    <p>Crear Profesores</p>
    <p>Crear Carreras</p>
</div>   
@endif

@endsection