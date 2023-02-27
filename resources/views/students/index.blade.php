@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de estudiantes</h2>
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
            <th>Semestre</th>
            <th>Carrera</th>
            <th>Fecha de ingreso</th>
            <th>Estado</th>
            <th width="250px">Acciones</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->datos->name }} {{ $student->datos->last_name }}</td>
            <td>{{ $student->semestre->semester_number }}</td>
            <td>{{ $student->carrera->name }}</td>
            <td>{{ $student->date_admission }}</td>
            <td>{{ $student->status }}</td>

            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('students.show',$student->id) }}">Mostrar</a>
                    @can('student-edit')
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('student-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
            @can('student-create') <!-- La condicion can da acceso al cotroller de rol-->
                <a class="btn btn-success" href="{{ route('students.create') }}"> Agregar estudiante</a>
            @endcan
    </div>

</div>

    {!! $students->links() !!}


@endsection