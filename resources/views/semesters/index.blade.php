@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de semestres</h2>
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
            <th>ID semestre</th>
            <th>Número de semestre</th>
            <th width="235px">Acciones</th>
        </tr>
        @foreach ($semesters as $semester)
        <tr>
            <td>{{ $semester->id }}</td>
            <td>{{ $semester->semester_number }}</td>

            <td>
                <form action="{{ route('semesters.destroy',$semester->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('semesters.show',$semester->id) }}">Mostrar</a>
                    @can('semester-edit')
                    <a class="btn btn-primary" href="{{ route('semesters.edit',$semester->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('semester-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
            @can('semester-create') <!-- La condicion can da acceso al cotroller de rol-->
                <a class="btn btn-success" href="{{ route('semesters.create') }}"> Agregar semestre</a>
            @endcan
    </div>

</div>

    {!! $semesters->links() !!}


@endsection