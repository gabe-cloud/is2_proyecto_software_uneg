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

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card">
                    <div>
                        <h3>Menu de creación de nuevo curso</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Curso ID:</strong>
                            <input type="text" name="id" class="form-control" placeholder="ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Profesor ID:</strong>
                            <input type="text" name="professor_id" class="form-control" placeholder="Profesor ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Sección ID:</strong>
                            <input type="text" name="section_id" class="form-control" placeholder="Sección ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Carrera ID:</strong>
                            <input type="text" name="career_id" class="form-control" placeholder="Carrera ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Horario ID:</strong>
                            <input type="text" name="schedules_id" class="form-control" placeholder="Horario ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            <input type="text" name="course_type" class="form-control" placeholder="Tipo">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Número unidades de credito:</strong>
                            <input type="text" name="credit_units" class="form-control" placeholder="0">
                        </div>
                    </div>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('courses.index') }}"> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection