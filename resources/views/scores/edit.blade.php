@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de nota</h2>
            </div>
        </div>
    </div>


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


    <form action="{{ route('scores.update',$score->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row bg-secondary">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nota ID:</strong>
                    <input type="text" name="id" value="{{ $score->id }}" class="form-control" placeholder="ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Curso ID:</strong>
                    <input type="text" name="course_id" value="{{ $score->course_id }}" class="form-control" placeholder="Curso ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <input type="text" name="descripction" value="{{ $score->description }}" class="form-control" placeholder="Descripcion">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Estudiante ID:</strong>
                    <input type="text" name="student_id" value="{{ $score->student_id }}" class="form-control" placeholder="Estudiante ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nota:</strong>
                    <input type="text" name="score" value="{{ $score->score }}" class="form-control" placeholder="Nota">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de nota:</strong>
                    <input type="date" name="score_date" value="{{ $score->score_date }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('scores.index') }}"> Atras</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </form>

</div>
@endsection