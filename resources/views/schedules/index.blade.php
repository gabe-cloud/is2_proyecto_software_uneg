@extends('layouts.app') <!-- Se exporta la vista layouts-->


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de horarios</h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered text-white bg-secondary p-2">
        <tr>
            <th>Horario ID</th>
            <th>Día</th>
            <th>Hora de entrada</th>
            <th>Hora de salida</th>
            <th width="250px">Acciones</th>
        </tr>
        @foreach ($schedules as $schedule)
        <tr>
            <td>{{ $schedule->id }}</td>
            <td>{{ $schedule->day }}</td>
            <td>{{ $schedule->entry_time }}</td>
            <td>{{ $schedule->departure_time }}</td>
          
            <td>
                <form action="{{ route('schedules.destroy',$schedule->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('schedules.show',$schedule->id) }}">Mostrar</a>
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

    <div class="pull-right">
            @can('schedule-create')
                <a class="btn btn-success" href="{{ route('schedules.create') }}"> Crear nuevo Horario</a>
            @endcan
    </div>

</div>

    {!! $schedules->links() !!}


@endsection