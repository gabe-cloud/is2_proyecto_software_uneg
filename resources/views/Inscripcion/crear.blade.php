@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="row">
        
    <h1>Inscripciones 2023</h1>
    <h2>Seleccione las asignaturas que va a inscribir este semestre </h2>
    
    <div class="">   
        @if(isset($message))
            <p>{{$message}}</p>
        @endif 
        <form action="{{route('incriptions.store')}}" method="post">
            {{ csrf_field() }}
            @foreach($nombre_asi as $asi)

                    
                <label><input type="checkbox" name="nombres[]" value="{{$asi->course_type}}"> {{$asi->course_type  }}
                    <select name="seccion[]">
                        <option value="no" selected>
                            Elija la seccion 
                        </option>
                        @for($i = 1; $i<= $asi->secciones; $i++)
                            <option value="Seccion {{$i}}">
                                Seccion {{"$i"}} 
                            </option>
                        @endfor
                    </select>
                    <br/>
                </label>
            @endforeach
            <br/>
            <input type="submit" name="submit" value="Enviar"/>
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