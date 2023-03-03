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
@if(count($datos)>=1 && count($carreras) >=1)
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card bg-secondary">
                    <div>
                        <h3>Vinculación de creacion de estudiante a una persona creada</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Estudiante:</strong>
                            <select name="id" class="form-control">
                                @foreach($datos as $dato)
                                    <option value="{{$dato->id}}"  selected >
                                        {{$dato->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="semester_id" value="1">
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
                            <strong>Fecha de ingreso:</strong>
                            <input type="date" name="date_admission" class="form-control" placeholder="Fecha">
                        </div>
                    </div>
                    <input type="hidden" name="status" value="No inscrito">
                    
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('students.index') }}"> Atras</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
<div class="container">
    <h1>No hay Estudiantes o carreras para asignar </h1>
</div>
@endif
@endsection