@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de semestre</h2>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Semestre ID:</strong>
                {{ $semester->id }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Número de semestre:</strong>
                {{ $semester->semester_number }}
            </div>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('semesters.index') }}"> Atras</a>
    </div>

</div>
@endsection
