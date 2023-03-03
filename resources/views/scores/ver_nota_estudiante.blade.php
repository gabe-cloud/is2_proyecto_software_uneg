@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="row">
    @if(isset($message))
        <p>{{$message}}</p>
    @endif
    @if(isset($asignaturas) && !empty($asignaturas))
        
        <h1>Materias inscritas:</h1>
        <h2>Selecciona la materia de la cual quieres ver las notas</h2>
        <div>
        
            @foreach($asignaturas as $asig)
                <label> 
                    {{$asig->asignaturas_control_ins->course_type}} 
                    <a class="btn btn-info" href="{{route('notas.ver', ['id'=>$asig->asignaturas_control_ins->id])}}">Ver notas</a>
                </label><br/>
            @endforeach 
        
        </div>
        <div class="row">
            <div class="col-xl-12 text-right">
                <a href="{{ route('notas.constancia') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">Descargar constancia de notas</a>
                <a href="{{ route('notas.ver_constancia') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">ver constancia de notas</a>
            </div>
        </div>
    @else
    <div class="container">
        <h1>No tienes materias inscritas</h1>
    </div>
    @endif
    
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
        </div>
    </div>
</div>

@endsection