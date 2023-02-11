@extends('layouts.app') <!-- Se exporta la vista layouts-->

<!-- Esta carpeta scores solo es creada de guia a la hora de realizar vistas de CRUD para que observen como esta estructurada 
y como se llamadan los valores y rutas, no tiene relacion con el proyecto-->


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de notas</h2>
            </div>
            <div class="pull-right">
                @can('score-create')
                <a class="btn btn-success" href="{{ route('score.create') }}"> Agregar datos de a una cuenta</a>
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
            <th>ID</th>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Número de telefono</th>
            <th>email</th>
            <th>nota</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($scores as $score)
        <tr>
            <td>{{ $score->id }}</td>
            <td>{{ $score->ci }}</td>
            <td>{{ $score->name }}</td>
            <td>{{ $score->last_name }}</td>
            <td>{{ $score->phone_number }}</td>
            <td>{{ $score->email }}</td>
            <td>{{ $score->score }}</td>
            <td>
                <form action="{{ route('course-scores.destroy',$score->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('course-scores.show',$score->id) }}">Crear/Modificar</a>
                    @can('score-edit')
                    <a class="btn btn-primary" href="{{ route('course-scores.edit',$score->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('score-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    


@endsection