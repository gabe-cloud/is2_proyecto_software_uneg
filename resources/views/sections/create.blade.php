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

    <form action="{{ route('sections.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card">
                    <div>
                        <h3>Creación de nueva sección</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Sección ID:</strong>
                            <input type="text" name="id" class="form-control" placeholder="ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Carrera ID:</strong>
                            <input type="text" name="career_id" class="form-control" placeholder="Carrera ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Semestre ID:</strong>
                            <input type="text" name="semester_id" class="form-control" placeholder="Semestre ID">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Número de sección:</strong>
                            <input type="text" name="section_number" class="form-control" placeholder="Número de sección">
                        </div>
                    </div>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('sections.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection