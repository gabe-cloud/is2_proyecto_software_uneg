@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de Seccion</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sections.index') }}"> Back</a>
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

    <form action="{{ route('sections.update',$section->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">
            <input type="hidden" name="id" value="{{ $section->id }}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Carrera ID:</strong>
                    <input type="text" name="career_id" value="{{ $section->career_id }}" class="form-control" placeholder="Carrera ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Semestre ID:</strong>
                    <input type="text" name="semesters_id" value="{{ $section->semesters_id }}" class="form-control" placeholder="Semestre ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Número de sección:</strong>
                    <input type="text" name="section_number" value="{{ $section->section_number }}" class="form-control" placeholder="Número de sección:">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>


    </form>


@endsection