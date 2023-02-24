@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de cursos</h2>
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
            <th>Nombre</th>
            <th>Profesor</th>
            <th>Sección</th>
            <th>Carrera</th>
            <th>Horario</th>
            <th>Unidades de credito</th>
            <th width="235px">Acciones</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->course_type }}</td>
            <td>{{ $course->profesor->datos->name }} {{ $course->profesor->datos->last_name }}</td>
            <td>{{ $course->seccion->section_number}}</td>
            <td>{{ $course->carrera->name }}</td>
            <td>{{ $course->horario->day}} - {{ $course->horario->entry_time}} - {{ $course->horario->departure_time}}</td>
            <td>{{ $course->credit_units }}</td>
            <td>
                <form action="{{ route('courses.destroy',$course->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('courses.show',$course->id) }}">Mostrar</a>
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

    <div class="pull-right">
        @can('course-create')
            <a class="btn btn-success" href="{{ route('courses.create') }}"> Agregar datos de una cuenta</a>
        @endcan
    </div>

</div>

    {!! $courses->links() !!}


@endsection