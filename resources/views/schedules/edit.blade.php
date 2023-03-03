@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de horarios</h2>
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


    <form action="{{ route('schedules.update',$schedule->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row bg-secondary">
            <input type="hidden" name="id" value="{{ $schedule->id }}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Día:</strong>
                    <input type="text" name="day" value="{{ $schedule->day }}" class="form-control" placeholder="Día">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora de entrada:</strong>
                    <input type="time" name="entry_time" value="{{ $schedule->entry_time }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hora de salida:</strong>
                    <input type="time" name="departure_time" value="{{ $schedule->departure_time }}" class="form-control">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('schedules.index') }}"> Atras</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </form>

</div>
@endsection