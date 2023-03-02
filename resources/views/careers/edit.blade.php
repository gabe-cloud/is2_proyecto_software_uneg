@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de carrera</h2>
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
    @if ($message = Session::get('Error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif


    <form action="{{ route('careers.update',$career->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row bg-secondary">
            <input type="hidden" name="id" value="{{ $career->id }}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Coordinador ID:</strong>
                    <input type="text" name="coordinator_id" value="{{ $career->coordinator_id }}" class="form-control" placeholder="Coordinador ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipo:</strong>
                    <input type="text" name="career_type" value="{{ $career->career_type }}" class="form-control" placeholder="Tipo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de carrera:</strong>
                    <input type="text" name="name" value="{{ $career->name }}" class="form-control" placeholder="Nombre de carrera">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('careers.index') }}"> Atras</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </form>
</div>

@endsection