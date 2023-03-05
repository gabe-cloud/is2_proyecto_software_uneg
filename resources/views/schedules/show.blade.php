@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de Horario</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('schedules.index') }}"> Regresar</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Dia:</strong>
                {{ $schedule->day }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Hora entrada:</strong>
                {{ $schedule->entry_time }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Hora Salida:</strong>
                {{ $schedule->departure_time }}
            </div>
        </div>
        
    </div>
@endsection
