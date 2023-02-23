@extends('layouts.app') <!-- Se exporta la vista layouts-->

 <!-- Esta vista no modifiquen sus rutas ya esta lista, lo que si pueden los de Front es mejorar la visualización mediante css o
como prefieran.-->
 <!-- Esta vista tiene el mismo funcionamiento de users/index se encarga de crear una tabla con los roles creados y da opcion de crear/editar/eliminar.-->
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Horario de clases</h2>
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
        <th>Dia</th>
        <th>Hora Entrada</th>
        <th>Hora Salida</th>
    </tr>
    
    @foreach ($schedules as $key => $schedul)
    <tr>
        
        <td>{{ $schedul->asignaturas_control_ins->horario->day }}</td>
        <td>{{ $schedul->asignaturas_control_ins->horario->entry_time }}</td>
        <td>{{ $schedul->asignaturas_control_ins->horario->departure_time }}</td>
    </tr>
    @endforeach
</table>


@endsection