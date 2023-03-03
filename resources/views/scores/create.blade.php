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

    <form action="{{ route('notas.poner_nota') }}" method="POST">
        @csrf

        <div class="container col-xs-3 col-sm-3 col-md-3 ">
            <div class="row justify-content-center">
                <div class="card">
                    <div>
                        <h3>Seleciione la asignatura en donde va a poner la nota</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Asignatura:</strong>
                            <select name="course_id" class="form-control">
                                @foreach($asignaturas as $asig)
                                    <option value="{{$asig->id}}"  selected >
                                        {{$asig->course_type}} - {{$asig->seccion->section_number}}
                                    </option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('scores.index') }}"> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection