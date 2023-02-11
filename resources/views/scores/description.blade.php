@extends('layouts.app') <!-- Se exporta la vista layouts-->

 <!-- Esta vista no modifiquen sus rutas ya esta lista, lo que si pueden los de Front es mejorar la visualización mediante css o
como prefieran.-->
 <!-- Esta vista tiene el mismo funcionamiento de users/index se encarga de crear una tabla con los roles creados y da opcion de crear/editar/eliminar.-->
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Notas de la asignatura: {{$nombre_asig->course_type}}</h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Descripcion</th>
        <th>Ponderacion 20%</th>
        <th>Fecha</th>
    </tr>
    
    @foreach ($notas as $key => $nota)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $nota->description }}</td>
        <td>{{ $nota->score }}</td>
        <td>{{ $nota->score_date }}</td>
    </tr>
    @endforeach
    <tr>
        <td>total</td>
        <td>{{$total}}</td>
    </tr>
</table>


@endsection