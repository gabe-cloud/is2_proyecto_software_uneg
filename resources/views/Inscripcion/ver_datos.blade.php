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
                    {{$asig['asignatura']->course_type}} - {{$asig['asignatura']->seccion->section_number}}
                    <a class="btn btn-danger" href="{{route('inscripciones.delete', ['id_control' =>$asig['control_ins']->id, 'id_ins' =>$asig['control_ins']->incription_id])}}">Retirar</a>
                    <a class="btn btn-info" href="{{route('inscripciones.cambio', ['id_control' => $asig['control_ins']->id, 'nombre_asig' => $asig['asignatura']->course_type , 'carrera' => $asig['asignatura']->career_id ])}}">Cambiar Seccion</a>
                </label><br/>
            @endforeach 
            <label> 
                <a class="btn btn-primary" href="{{route('inscripciones.adicion')}}">Adicionar materia</a><br><br> 
            </label>
        
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