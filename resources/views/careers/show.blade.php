@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de carrera</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('careers.index') }}"> Regresar</a>
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Carrera ID:</strong>
                {{ $career->id }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Coordinador</strong>
                {{ $career->coordinador->datos->name }} {{ $career->coordinador->datos->last_name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Tipo:</strong>
                {{ $career->career_type }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Nombre de carrera:</strong>
                {{ $career->name }}
            </div>
        </div>
@endsection
