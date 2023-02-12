@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="row">
    @if(isset($message))
        <p>{{$message}}</p>
    @endif
    @if(isset($asignaturas) && !empty($asignaturas))
        
        <h1>Materias inscritas:</h1>
        <div>
        
            @foreach($asignaturas as $asig)
                <label> 
                    {{$asig->asignaturas_control_ins->course_type}} - {{$asig->asignaturas_control_ins->seccion->section_number}}
                    <a class="btn btn-danger" href="{{route('inscripciones.delete', ['id_control' =>$asig->id, 'id_ins' =>$asig->incription_id])}}">Retirar</a>
                    <a class="btn btn-info" href="{{route('inscripciones.cambio', ['id_control' => $asig->id, 'nombre_asig' => $asig->asignaturas_control_ins->course_type , 'carrera' => $asig->asignaturas_control_ins->career_id ])}}">Cambiar Seccion</a>
                </label><br/>
            @endforeach 
            <label> 
                <a class="btn btn-primary" href="{{route('inscripciones.adicion')}}">Adicionar materia</a><br><br> 
            </label>
        
        </div>
        <div class="row">
            <div class="col-xl-12 text-right">
                <a href="{{ route('inscripciones.constancia') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">Descargar constancia de inscripcion</a>
                <a href="{{ route('inscripciones.ver_constancia') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">ver constancia de inscripcion</a>
            </div>
        </div>
    @else
        <h1>No tienes materias inscritas</h1>
    @endif
    
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

@endsection