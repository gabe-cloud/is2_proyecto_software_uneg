@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edición de estudiante</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
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
    <form action="{{ route('students.update',$student->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">
            <input type="hidden" name="id" value="{{ $student->id }}">
            <input type="hidden" name="status" value="{{ $student->status }}">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Semestre ID:</strong>
                    <input type="text" name="semester_id" value="{{ $student->semester_id }}" class="form-control" placeholder="Semestre ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Carrera ID:</strong>
                    <input type="text" name="career_id" value="{{ $student->career_id }}" class="form-control" placeholder="Carrera ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha de ingreso:</strong>
                    <input type="text" name="date_admission" value="{{ $student->date_admission }}" class="form-control" placeholder="Fecha de ingreso">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>


    </form>


@endsection