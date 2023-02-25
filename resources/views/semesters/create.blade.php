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

    <form action="{{ route('semesters.store') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card bg-secondary">
                    <div>
                        <h3>Creación de semestre</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Número de semestre:</strong>
                            <input type="text" name="semester_number" class="form-control" placeholder="Número de semestre">
                        </div>
                    </div>
                    <div class="text-center">
                            <a class="btn btn-primary" href="{{ route('semesters.index') }}"> Back</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection