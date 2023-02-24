@extends('layouts.app') <!-- Se exporta la vista layouts-->


<!-- Esta vista hay que hacer que unicamente pueda acceder el rol admin-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de coordinadores</h2>
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
            <th>Nombre y Apellido</th>
            <th>Cargo</th>
            <th>Fecha de ingreso</th>
            <th width="235px">Acciones</th>
        </tr>
        @foreach ($coordinators as $coordinator)
        <tr>
            <td>{{ $coordinator->datos->name }} {{ $coordinator->datos->last_name }}</td>
            <td>{{ $coordinator->appointment }}</td>
            <td>{{ $coordinator->date_admission }}</td>
            <td>
                <form action="{{ route('coordinators.destroy',$coordinator->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('coordinators.show',$coordinator->id) }}">Mostrar</a>
                    @can('coordinator-edit')
                    <a class="btn btn-primary" href="{{ route('coordinators.edit',$coordinator->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('coordinator-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
            @can('coordinator-create')
                <a class="btn btn-success" href="{{ route('coordinators.create') }}"> Agregar datos de coordinador</a>
            @endcan
    </div>

</div>

    {!! $coordinators->links() !!}


@endsection