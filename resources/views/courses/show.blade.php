@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de curso</h2>
            </div>
        </div>
    </div>
</div>

    <div class="row mt-2">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Curso ID:</strong>
                {{ $course->id }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Profesor:</strong>
                {{ $course->profesor->datos->name }} {{ $course->profesor->datos->last_name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Sección:</strong>
                {{ $course->seccion->section_number}}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Carrera:</strong>
                {{ $course->carrera->name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Horario:</strong>
                {{ $course->horario->day}} - {{ $course->horario->entry_time}} - {{ $course->horario->departure_time}}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $course->course_type }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Unidades de credito:</strong>
                {{ $course->credit_units }}
            </div>
        </div>
        <div class="pull-right text-center">
            <a class="btn btn-primary" href="{{ route('courses.index') }}"> Atras</a>
        </div>
    </div>


@endsection
