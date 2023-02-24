@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de secciones</h2>
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
            <th>ID carrera</th>
            <th>ID semestre</th>
            <th>Número de sección</th>
            <th width="235px">Acciones</th>
        </tr>
        @foreach ($sections as $section)
        <tr>
            <td>{{ $section->id }}</td>
            <td>{{ $section->carrera->name }}</td>
            <td>{{ $section->semestres_secciones->semester_number}}</td>
            <td>{{ $section->section_number }}</td>

            <td>
                <form action="{{ route('sections.destroy',$section->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('sections.show',$section->id) }}">Mostrar</a>
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

    <div class="pull-right">
            @can('section-create') <!-- La condicion can da acceso al cotroller de rol-->
                <a class="btn btn-success" href="{{ route('sections.create') }}"> Agregar nueva sección</a>
            @endcan
    </div>

</div>

    {!! $sections->links() !!}


@endsection