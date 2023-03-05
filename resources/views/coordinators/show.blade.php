@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de coordinador</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('coordinators.index') }}"> Regresar</a>
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Coordinador ID:</strong>
                {{ $coordinator->id }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $coordinator->datos->name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Apellido:</strong>
                {{ $coordinator->datos->last_name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Cargo:</strong>
                {{ $coordinator->appointment }}

            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Fecha de ingreso:</strong>
                {{ $coordinator->date_admission }}
            </div>
        </div>
    </div>


@endsection
