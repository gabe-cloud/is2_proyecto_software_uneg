@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="">
            
        <h1>Inscripciones 2023</h1>
        <h2>Seleccione las asignaturas que desea adicionar </h2>
        
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">   
            @if(isset($message))
                <p>{{$message}}</p>
            @endif 
            <form action="{{route('inscripciones.save_adicion')}}" method="post">
                {{ csrf_field() }}
                
                
                @foreach($nombre_asi as $asi)
                        
                    <label><input type="checkbox" name="nombres[]" value="{{$asi[0]->course_type}}"> {{$asi[0]->course_type  }}
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
                        <br/>
                    </label>
                @endforeach
                
                <input type="hidden" name="id_ins" value="{{$id_ins}}"/>
                <input type="submit" name="submit" class="btn btn-success" value="Adicionar"/>
            </form>
        </div>
        
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('incriptions.index') }}"> Atras</a>
            </div>
        </div>
    </div>
</div>
@endsection