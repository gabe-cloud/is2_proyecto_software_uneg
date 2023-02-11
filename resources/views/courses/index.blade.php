@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de cursos</h2>
            </div>
            <div class="pull-right">
                @can('course-create')
                <a class="btn btn-success" href="{{ route('courses.create') }}"> Agregar datos de a una cuenta</a>
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
            <th>Curso ID</th>
            <th>Profesor ID</th>
            <th>Sección ID</th>
            <th>Carrera ID</th>
            <th>Horario ID</th>
            <th>Tipo</th>
            <th>Unidades de credito</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->professor_id }}</td>
            <td>{{ $course->section_id }}</td>
            <td>{{ $course->career_id }}</td>
            <td>{{ $course->schedules_id }}</td>
            <td>{{ $course->course_type }}</td>
            <td>{{ $course->credit_units }}</td>
            <td>
                <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('courses.show',$course->id) }}">Mostrar</a>
                    @can('course-edit')
                    <a class="btn btn-primary" href="{{ route('courses.edit',$course->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('course-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    {!! $courses->links() !!}


@endsection