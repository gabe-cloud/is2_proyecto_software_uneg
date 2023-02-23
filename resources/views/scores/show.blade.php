@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de nota</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('scores.index') }}"> Regresar</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota ID:</strong>
                {{ $score->id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Curso ID:</strong>
                {{ $score->course_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {{ $score->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estudiante ID:</strong>
                {{ $score->student_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nota:</strong>
                {{ $score->score_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de nota:</strong>
                {{ $score->status }}
            </div>
        </div>
    </div>
@endsection
