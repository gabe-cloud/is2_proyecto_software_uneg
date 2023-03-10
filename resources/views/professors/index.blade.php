@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de profesores</h2>
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
            <th>Profesión</th>
            <th>Fecha de ingreso</th>
            <th>Tipo de profesor</th>
            <th width="250px">Acciones</th>
        </tr>
        @foreach ($professors as $professor)
        <tr>
            <td>{{ $professor->datos->name }} {{ $professor->datos->last_name }}</td>
            <td>{{ $professor->profession }}</td>
            <td>{{ $professor->date_admission }}</td>
            <td>{{ $professor->professor_type }}</td>

            <td>
                <form action="{{ route('professors.destroy',$professor->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('professors.show',$professor->id) }}">Mostrar</a>
                    @can('professor-edit')
                    <a class="btn btn-primary" href="{{ route('professors.edit',$professor->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('professor-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
            @can('professor-create')
                <a class="btn btn-success" href="{{ route('professors.create') }}"> Agregar profesor</a>
            @endcan
    </div>

</div>

    {!! $professors->links() !!}


@endsection