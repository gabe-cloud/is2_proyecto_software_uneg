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
@if(count($datos)>=1)
    <form action="{{ route('coordinators.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card bg-secondary">
                    <div>
                        <h3>Vinculación de creacion de coordinador a una persona creada</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Coordinador:</strong>
                            <select name="id" class="form-control">
                                @foreach($datos as $dato)
                                    <option value="{{$dato->id}}"  selected >
                                        {{$dato->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            <input type="text" name="appointment" class="form-control" placeholder="Cargo">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Fecha de ingreso:</strong>
                            <input type="date" name="date_admission" class="form-control" placeholder="Fecha">
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('coordinators.index') }}"> Atras</a>
                        <button type="submit" class="btn btn-success">Guardar</button>  
                    </div>
                </div>
            </div> 
        </div>
    </form>
@else
<div class="container">
    <h1>No hay Coordinadores para asignar cargos</h1>
</div>
@endif

@endsection