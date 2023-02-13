@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de Notas</h2>
            </div>
            <div class="pull-right">
                @can('score-create') <!-- La condicion can da acceso al cotroller de rol-->
                <a class="btn btn-success" href="{{ route('scores.create') }}"> Agregar nota</a>
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
            <th>Curso ID</th>
            <th>Descripcion</th>
            <th>Estudiante ID</th>
            <th>Nota</th>
            <th>Fecha de nota</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($scores as $score)
        <tr>
            <td>{{ $score->id }}</td>
            <td>{{ $score->course_id }}</td>
            <td>{{ $score->description }}</td>
            <td>{{ $score->student_id }}</td>
            <td>{{ $score->score }}</td>
            <td>{{ $score->score_date }}</td>

            <td>
                <form action="{{ route('scores.destroy',$score->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('scores.show',$score->id) }}">Mostrar</a>
                    @can('score-edit')
                    <a class="btn btn-primary" href="{{ route('scores.edit',$score->id) }}">Editar</a>
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


    {!! $scores->links() !!}


@endsection