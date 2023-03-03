@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de profesor</h2>
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


    <form action="{{ route('professors.update',$professor->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row bg-secondary">
            <input type="hidden" name="id" value="{{ $professor->id }}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Profesión:</strong>
                    <input type="text" name="profession" value="{{ $professor->profession }}" class="form-control" placeholder="Profesión">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de ingreso:</strong>
                    <input type="date" name="date_admission" value="{{ $professor->date_admission }}" class="form-control" placeholder="Fecha">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipo de profesor:</strong>
                    <input type="text" name="professor_type" value="{{ $professor->professor_type }}" class="form-control" placeholder="Tipo de profesor">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('professors.index') }}"> Atras</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </form>

</div>
@endsection