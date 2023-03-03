@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        @if(isset($message))
            <p>{{$message}}</p>
        @endif
        @if(isset($asignaturas) && !empty($asignaturas))
        <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Materias inscritas:</h2>
                </div>
            </div>

            <table class="table table-bordered text-white bg-secondary p-2">
                <tr>
                    <th>Asignaturas</th>
                    <th>Sección</th>
                    <th>Opciones</th>
                </tr>
                @foreach($asignaturas as $asig)
                <tr>
                    <td>{{$asig->asignaturas_control_ins->course_type}}
                    <td>{{$asig->asignaturas_control_ins->seccion->section_number}}
                    <td>   
                        <form> 
                            <a class="btn btn-danger" href="{{route('inscripciones.delete', ['id_control' =>$asig->id, 'id_ins' =>$asig->incription_id])}}">Retirar</a>
                            <a class="btn btn-info" href="{{route('inscripciones.cambio', ['id_control' => $asig->id, 'nombre_asig' => $asig->asignaturas_control_ins->course_type , 'carrera' => $asig->asignaturas_control_ins->career_id ])}}">Cambiar Seccion</a>
                        </form>
                    </td> 
                </tr>   
                @endforeach 
            </table>

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('home') }}"> Atras</a>
                        <a class="btn btn-info" href="{{route('inscripciones.adicion')}}">Adicionar materia</a><br><br> 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 text-right">
                    <a href="{{ route('inscripciones.constancia') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">Descargar constancia de inscripcion</a>
                    <a href="{{ route('inscripciones.ver_constancia') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm">ver constancia de inscripcion</a>
                </div>
            </div>
        @else
        <div class="container">
            <h1>No tienes materias inscritas</h1>
        </div>
        @endif
        
    </div>
</div>

@endsection