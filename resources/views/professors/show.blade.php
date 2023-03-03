@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Datos de profesor</h2>
                </div>
            </div>
        </div>


        <div class="row">
    <div class="row mt-2">
            <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
                <div class="form-group">
                    <strong>ID de profesor:</strong>
                    {{ $professor->id }}
                </div>
            </div>
            <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {{ $professor->datos->name }}
                </div>
            </div>
            <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
                <div class="form-group">
                    <strong>Apellido:</strong>
                    {{ $professor->datos->last_name }}
                </div>
            </div>
            <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
                <div class="form-group">
                    <strong>CI:</strong>
                    {{ $professor->datos->ci }}
                </div>
            </div>
            <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
                <div class="form-group">
                    <strong>Fecha ingreso:</strong>
                    {{ $professor->date_admission }}
                </div>
            </div>
            <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
                <div class="form-group">
                    <strong>Profession:</strong>
                    {{ $professor->profession }}
                </div>
            </div>
            <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
                <div class="form-group">
                    <strong>Tipo:</strong>
                    {{ $professor->professor_type }}
                </div>
            </div>
            <div class="pull-right text-center">
                <a class="btn btn-primary" href="{{ route('professors.index') }}"> Atras</a>
            </div>

        </div>
</div>
@endsection
