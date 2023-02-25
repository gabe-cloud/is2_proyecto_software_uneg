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
                @can('course-scores-create')
                <a class="btn btn-success" href="{{ route('course-scores.create') }}"> Agregar datos de a una cuenta</a>
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
            <th class=" text-white">ID</th>
            <th class=" text-white">CI</th>
            <th class=" text-white">Nombre</th>
            <th class=" text-white">Apellido</th>
            <th class=" text-white">Número de telefono</th>
            <th class=" text-white">email</th>
            <th class=" text-white">materia</th>
            <th class=" text-white">nota</th>
            <th class=" text-white" width="280px">Acciones</th>
        </tr>
        @foreach ($scores as $score)
        <tr>
            <td class=" text-white">{{ $score->id }}</td>
            <td class=" text-white" >{{ $score->ci }}</td>
            <td class=" text-white">{{ $score->name }}</td>
            <td class=" text-white" >{{ $score->last_name }}</td>
            <td class=" text-white">{{ $score->phone_number }}</td>
            <td class=" text-white">{{ $score->email }}</td>
            <td class=" text-white">{{ $score->type }}</td>
            <td class=" text-white">{{ $score->score }}</td>
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