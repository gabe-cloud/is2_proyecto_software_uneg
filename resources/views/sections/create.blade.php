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
@if(count($carreras) >=1 && count($semestres)>=1)
    <form action="{{ route('sections.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card bg-secondary">
                    <div>
                        <h3>Creación de nueva sección</h3>
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
                            <strong>Semestre:</strong>
                            <select name="semesters_id" class="form-control">
                                @foreach($semestres as $semestre)
                                    <option value="{{$semestre->id}}"  selected >
                                        {{$semestre->semester_number}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Número de sección:</strong>
                            <input type="text" name="section_number" class="form-control" placeholder="Número de sección">
                        </div>
                    </div>
                    <div class="text-center">
                            <a class="btn btn-primary" href="{{ route('sections.index') }}"> Atras</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
<div class="container">
    <h1>No hay secciones o carreras por favor crealas primero</h1>
</div>
@endif
@endsection