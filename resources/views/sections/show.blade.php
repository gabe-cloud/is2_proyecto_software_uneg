@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de sección</h2>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Seccion ID:</strong>
                {{ $section->id }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Carrera:</strong>
                {{ $section->carrera->name}}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Semestre:</strong>
                {{ $section->semestres_secciones->semester_number}}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Número de sección:</strong>
                {{ $section->section_number }}
            </div>
        </div>

    </div>
    <div class="pull-right text-center">
        <a class="btn btn-primary" href="{{ route('sections.index') }}"> Atras</a>
    </div>

</div>
@endsection
