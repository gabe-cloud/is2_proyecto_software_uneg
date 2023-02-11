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
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nota ID:</strong>
                            <input type="text" name="id" class="form-control" placeholder="ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Curso ID:</strong>
                            <input type="text" name="course_id" class="form-control" placeholder="Curso ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Estudiante ID:</strong>
                            <input type="text" name="student_id" class="form-control" placeholder="Estudiante ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nota:</strong>
                            <input type="date" name="score" class="form-control" placeholder="Nota">
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
                        <a class="btn btn-primary" href="{{ route(scores.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection