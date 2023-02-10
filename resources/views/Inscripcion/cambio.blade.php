@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div>
    @if(isset($message))
        <p>{{$message}}</p>
    @endif
    @if(isset($cambio) && isset($asignatura))
        <form action="{{route('inscripciones.update_seccion')}}" method="post">
            {{ csrf_field() }}
            <label for="">
                {{$asignatura}}
                <select name="seccion">
                    @foreach($cambio as $ca)
                        <option value="{{$ca->id}}">
                            {{$ca->seccion->section_number}} 
                        </option>
                    @endforeach
                </select>
            </label>
            <input type="hidden" name="control_id" value="{{$control_id}}">
            <input type="submit" value="Cambiar">
        </form>
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