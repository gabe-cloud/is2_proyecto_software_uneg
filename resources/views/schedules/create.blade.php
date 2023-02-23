@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')

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

    <form action="{{ route('schedules.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card">
                    <div>
                        <h3>Menu de creación nuevo horario</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Horario ID:</strong>
                            <input type="text" name="id" class="form-control" placeholder="Horario ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Día:</strong>
                            <input type="text" name="day" class="form-control" placeholder="Día">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Hora de entrada:</strong>
                            <input type="time" name="entry_time" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Hora de salida:</strong>
                            <input type="time" name="departure_time" class="form-control">
                        </div>
                    </div>
                    
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('schedules.index') }}"> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection