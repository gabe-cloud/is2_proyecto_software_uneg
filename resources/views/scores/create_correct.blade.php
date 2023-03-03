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

    <form action="{{ route('scores.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card">
                    <div>
                        <h3>Registro de nueva nota</h3>
                    </div>
                    <!--
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nota ID:</strong>
                            <input type="text" name="id" class="form-control" placeholder="ID">   N
                        </div>
                    </div>-->  <!-- No tiene sentido pedir la id de la nota-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Asignatura: {{$nombre_asig}}</strong>
                            <input type="hidden" name="course_id" value="{{$course_id}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            <input type="text" name="description" class="form-control" placeholder="Descriptcion">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Estudiante:</strong>
                            <select name="student_id" class="form-control">
                                @foreach($inscritos as $ins)
                                    <option value="{{$ins->inscripcion_control_ins->student_id}}"  selected >
                                        {{$ins->inscripcion_control_ins->estudiante_ins->datos->name}} {{$ins->inscripcion_control_ins->estudiante_ins->datos->last_name}} 
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nota:</strong>
                            <input  type="text" name="score" class="form-control" placeholder="Nota">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Fecha de nota:</strong>
                            <input type="date" name="score_date" class="form-control">
                        </div>
                    </div>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('scores.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection