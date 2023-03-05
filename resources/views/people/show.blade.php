@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de Persona</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('people.index') }}"> Regresar</a>
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>ID de cuenta:</strong>
                {{ $person->id }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>CI:</strong>
                {{ $person->ci }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $person->name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Apellido:</strong>
                {{ $person->last_name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Número telefonico:</strong>
                {{ $person->phone_number }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Dirección de hogar:</strong>
                {{ $person->address }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Correo electronico personal:</strong>
                {{ $person->email }}
            </div>
        </div>
    </div>
@endsection
