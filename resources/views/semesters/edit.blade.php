@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de semestre</h2>
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


    <form action="{{ route('semesters.update',$semester->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row bg-secondary">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Semestre ID:</strong>
                    <input type="text" name="id" value="{{ $semester->id }}" class="form-control" placeholder="ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Número de semestre:</strong>
                    <input type="text" name="semester_number" value="{{ $semester->semester_number }}" class="form-control" placeholder="Número de semestre">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('semesters.index') }}"> Atras</a> 
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </form>

</div>
@endsection