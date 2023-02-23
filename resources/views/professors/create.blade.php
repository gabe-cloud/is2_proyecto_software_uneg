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

    <form action="{{ route('professors.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card">
                    <div>
                        <h3>Vinculación de creación de un profesor a una persona creada</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Profesor ID:</strong>
                            <input type="text" name="id" class="form-control" placeholder="ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Profesión:</strong>
                            <input type="text" name="profession" class="form-control" placeholder="Profesión">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Fecha de ingreso:</strong>
                            <input type="date" name="date_admission" class="form-control" placeholder="Fecha de ingreso">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Tipo de profesor:</strong>
                            <select name="professor_type" class="form-control">
                                    <option value="Pregrado">
                                        Preprado
                                    </option>
                                    <option value="Postgrado">
                                        Postgrado
                                    </option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('professors.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection