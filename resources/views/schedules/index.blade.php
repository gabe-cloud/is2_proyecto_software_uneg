@extends('layouts.app') <!-- Se exporta la vista layouts-->

<<<<<<< HEAD

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de horarios</h2>
            </div>
            <div class="pull-right">
                @can('schedule-create')
                <a class="btn btn-success" href="{{ route('schedules.create') }}"> Crear nuevo Horario</a>
                @endcan
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
            <th>Horario ID</th>
            <th>Día</th>
            <th>Hora de entrada</th>
            <th>Hora de salida</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($schedules as $schedule)
        <tr>
            <td>{{ $schedule->id }}</td>
            <td>{{ $schedule->day }}</td>
            <td>{{ $schedule->entry_time }}</td>
            <td>{{ $schedule->departure_time }}</td>
          
            <td>
                <form action="{{ route('schedules.destroy',$schedule->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('schedules.show',$schedule->id) }}">Mostrar</a>
                    @can('schedule-edit')
                    <a class="btn btn-primary" href="{{ route('schedules.edit',$schedule->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('schedule-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    {!! $schedules->links() !!}

=======
 <!-- Esta vista no modifiquen sus rutas ya esta lista, lo que si pueden los de Front es mejorar la visualización mediante css o
como prefieran.-->
 <!-- Esta vista tiene el mismo funcionamiento de users/index se encarga de crear una tabla con los roles creados y da opcion de crear/editar/eliminar.-->
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestión de Horarios</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('schedules.create') }}"> Crear nuevo Horario</a>
            @endcan
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
        <th>Dia</th>
        <th>Hora Entrada</th>
        <th>Hora Salida</th>
        <th width="280px">Acciones</th>
    </tr>
    
    @foreach ($schedules as $key => $schedul)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $schedul->day }}</td>
        <td>{{ $schedul->entry_time }}</td>
        <td>{{ $schedul->departure_time }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('schedules.show',$schedul->id) }}">Mostrar</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('schedules.edit',$schedul->id) }}">Editar</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['schedules.destroy', $schedul->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $schedules->render() !!}
>>>>>>> Eduard

@endsection