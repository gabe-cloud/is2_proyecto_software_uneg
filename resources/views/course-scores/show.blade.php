@extends('layouts.app') <!-- Se exporta la vista layouts-->



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Notas de estudiantes</h2>
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


    <table class="table bg-secondary p-2 table-bordered">
        <tr>
            <th class=" text-white">ID</th>
            <th class=" text-white">CI</th>
            <th class=" text-white">Nombre</th>
            <th class=" text-white">Apellido</th>
            <th class=" text-white">Número de telefono</th>
            <th class=" text-white">email</th>
            <th class=" text-white">materia</th>
            <th class=" text-white">nota acumulada</th>
            <th class=" text-white">num de notas</th>
            <!--<th class=" text-white" width="300px">Acciones</th>-->
            
        </tr>
        @foreach ($prof_scoring as $score)
        <tr>
            <td class=" text-white">{{ $score->id }}</td>
            <td class=" text-white" >{{ $score->ci }}</td>
            <td class=" text-white">{{ $score->name }}</td>
            <td class=" text-white" >{{ $score->last_name }}</td>
            <td class=" text-white">{{ $score->phone_number }}</td>
            <td class=" text-white">{{ $score->email }}</td>
            <td class=" text-white">{{ $score->type }}</td>
            
            <td class=" text-white">{{ $score->score }}</td>
            <td class=" text-white">{{ $score->score_count }}</td>
            <!--
            <td>
                <form action="{{ route('course-scores.destroy',$score->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('course-scores.show',$score->id) }}">Crear/Modificar</a>
                    @can('score-edit')
                    <a class="btn btn-primary" href="{{ route('course-scores.edit',$score->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('score-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td> -->
        </tr>
        @endforeach
    </table>


    

</div>
@endsection