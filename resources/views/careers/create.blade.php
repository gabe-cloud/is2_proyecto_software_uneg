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
                <div class="card">
                    <div>
                        <h3>Menu de creación de nueva carrera</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Carrera ID:</strong>
                            <input type="text" name="id" class="form-control" placeholder="ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Coordinador ID:</strong>
                            <input type="text" name="coordinator_id" class="form-control" placeholder="Coordinador ID">
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
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('careers.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection