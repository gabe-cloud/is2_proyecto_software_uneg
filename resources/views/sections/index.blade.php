@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de secciones</h2>
            </div>
            <div class="pull-right">
                @can('section-create') <!-- La condicion can da acceso al cotroller de rol-->
                <a class="btn btn-success" href="{{ route('sections.create') }}"> Agregar nueva sección</a>
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
            <th>ID carrera</th>
            <th>ID semestre</th>
            <th>Número de sección</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($sections as $section)
        <tr>
            <td>{{ $section->id }}</td>
            <td>{{ $section->career_id }}</td>
            <td>{{ $section->semesters_id }}</td>
            <td>{{ $section->section_number }}</td>

            <td>
                <form action="{{ route('sections.destroy',$section->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('sections.show',$section->id) }}">Mostrar</a>
                    @can('section-edit')
                    <a class="btn btn-primary" href="{{ route('sections.edit',$section->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('section-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    {!! $sections->links() !!}


@endsection