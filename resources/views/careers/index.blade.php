@extends('layouts.app') <!-- Se exporta la vista layouts-->


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de carreras</h2>
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
            <th>ID</th>
            <th>Coordinador</th>
            <th>Tipo de carrera</th>
            <th>Nombre de carrera</th>
            <th width="250px">Acciones</th>
        </tr>
        @foreach ($careers as $career)
        <tr>
            <td>{{ $career->id }}</td>
            <td>{{ $career->coordinador->datos->name }} {{ $career->coordinador->datos->last_name }}</td>
            <td>{{ $career->career_type }}</td>
            <td>{{ $career->name }}</td>
            <td>
                <form action="{{ route('careers.destroy',$career->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('careers.show',$career->id) }}">Mostrar</a>
                    @can('career-edit')
                    <a class="btn btn-primary" href="{{ route('careers.edit',$career->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('career-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
            @can('career-create')
                <a class="btn btn-success" href="{{ route('careers.create') }}"> Agregar carrera</a>
            @endcan
    </div>

</div>

    {!! $careers->links() !!}


@endsection