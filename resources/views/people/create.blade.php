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
    

    <form action="{{ route('people.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card">
                    <div>
                        <h3>Vincular persona a usuario</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Usuario:</strong>
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
                            <strong>CI:</strong>
                            <input type="text" name="ci" class="form-control" placeholder="CI">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            <input type="text" name="last_name" class="form-control" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Número telefonico:</strong>
                            <input type="text" name="phone_number" class="form-control" placeholder="#">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Dirección de hogar:</strong>
                            <input type="text" name="address" class="form-control" placeholder="Dirección">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Correo electronico personal:</strong>
                            <input type="text" name="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                    </div>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('people.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@else
<h1>No hay usuarios para asignar a una persona</h1>
<h2>Por favor cree un nuevo usuario para poder asignarlo a una persona</h2>
@endif
@endsection