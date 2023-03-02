@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de curso</h2>
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

    <form action="{{ route('courses.update',$course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $course->id }}">
        <input type="hidden" name="career_id" value="{{ $course->career_id }}">
        
         <div class="row bg-secondary">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Profesor ID:</strong>
                    <input type="text" name="professor_id" value="{{ $course->professor_id }}" class="form-control" placeholder="Profesor">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sección ID:</strong>
                    <input type="text" name="section_id" value="{{ $course->section_id }}" class="form-control" placeholder="Sección ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Horario ID:</strong>
                    <input type="text" name="schedules_id" value="{{ $course->schedules_id }}" class="form-control" placeholder="Horario ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="course_type" value="{{ $course->course_type }}" class="form-control" placeholder="Tipo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Unidades de Credito:</strong>
                    <input type="text" name="credit_units" value="{{ $course->credit_units }}" class="form-control" placeholder="0">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('courses.index') }}"> Atras</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </form>
</div>

@endsection