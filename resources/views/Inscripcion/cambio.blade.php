@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div>
        @if(isset($message))
            <p>{{$message}}</p>
        @endif
        @if(isset($cambio) && isset($asignatura))
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
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
                <input type="submit" class="btn btn-success" value="Cambiar">
            </form>
        </div>      
        @endif
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Atras</a>
            </div>
        </div>
    </div>
</div>
@endsection