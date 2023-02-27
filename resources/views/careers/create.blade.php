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

    <form action="{{ route('careers.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card bg-secondary">
                    <div>
                        <h3>Menu de creación de nueva carrera</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Coordinador:</strong>
                            <select name="coordinator_id" class="form-control">
                                @foreach($datos as $dato)
                                    <option value="{{$dato->id}}"  selected >
                                        {{$dato->datos->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Tipo de carrera:</strong>
                            <input type="text" name="career_type" class="form-control" placeholder="Tipo">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Nombre de carrera:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Nombre de nueva carrera">
                        </div>
                    </div>
                    <div class="text-center">
                            <a class="btn btn-primary" href="{{ route('careers.index') }}"> Back</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection