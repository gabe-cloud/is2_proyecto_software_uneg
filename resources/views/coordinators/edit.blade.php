@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de coordinador</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('coordinators.index') }}"> Back</a>
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


    <form action="{{ route('coordinators.update',$coordinator->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">
            <input type="hidden" name="id" value="{{ $coordinator->id }}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cargo:</strong>
                    <input type="text" name="appointment" value="{{ $coordinator->appointment }}" class="form-control" placeholder="Cargo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de ingreso:</strong>
                    <input type="date" name="date_admission" value="{{ $coordinator->date_admission }}" class="form-control" placeholder="Fecha">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>


    </form>


@endsection