@extends('layouts.app') <!-- Se exporta la vista layouts-->

<!-- Esta carpeta people solo es creada de guia a la hora de realizar vistas de CRUD para que observen como esta estructurada 
y como se llamadan los valores y rutas-->


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de personas</h2>
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
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Número de telefono</th>
            <th>Dirección</th>
            <th>Correo Personal</th>
            <th width="250px">Acciones</th>
        </tr>
        @foreach ($people as $person)
        <tr>
            <td>{{ $person->id }}</td>
            <td>{{ $person->ci }}</td>
            <td>{{ $person->name }}</td>
            <td>{{ $person->last_name }}</td>
            <td>{{ $person->phone_number }}</td>
            <td>{{ $person->address }}</td>
            <td>{{ $person->email }}</td>
            <td>
                <form action="{{ route('people.destroy',$person->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('people.show',$person->id) }}">Mostrar</a>
                    @can('person-edit')
                    <a class="btn btn-primary" href="{{ route('people.edit',$person->id) }}">Editar</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('person-delete')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
                @can('person-create')
                <a class="btn btn-success" href="{{ route('people.create') }}"> Agregar datos de una cuenta</a>
                @endcan
    </div>

</div>

    {!! $people->links() !!}


@endsection