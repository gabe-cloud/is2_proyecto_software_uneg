@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="">
        
    <h1>Inscripciones 2023</h1>
    <h2>Seleccione las asignaturas que desea adicionar </h2>
    
    <div class="">   
        @if(isset($message))
            <p>{{$message}}</p>
        @endif 
        <form action="{{route('inscripciones.save_adicion')}}" method="post">
            {{ csrf_field() }}
            
            <table class="table table-bordered text-white bg-secondary p-2">
                <tr>
                    <th>materia</th>
                    <th>seccion</th>
                </tr>
                
            @foreach($nombre_asi as $asi)
                <tr>
                    <td>
                        <input type="checkbox" name="nombres[]" value="{{$asi[0]->course_type}}"> {{$asi[0]->course_type  }}   
                    </td>
                    <td> 
                        <select name="seccion[]">
                            <option value="no" selected>
                                Elija la seccion 
                            </option>
                            @for($i = 1; $i<= $asi[0]->secciones; $i++)
                                <option value="Seccion {{$i}}">
                                    Seccion {{"$i"}} 
                                </option>
                            @endfor
                        </select>
                    </td>
                </tr>
                
            @endforeach
            </table>
            
            <input type="hidden" name="id_ins" value="{{$id_ins}}"/> <!--que es este input?-->
            <input class="btn btn-primary m-2" type="submit" name="submit" value="Enviar"/>
        </form>
    </div>
    
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

@endsection