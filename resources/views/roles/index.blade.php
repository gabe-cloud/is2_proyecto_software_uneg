@extends('layouts.app') <!-- Se exporta la vista layouts-->

 <!-- Esta vista no modifiquen sus rutas ya esta lista, lo que si pueden los de Front es mejorar la visualización mediante css o
como prefieran.-->
 <!-- Esta vista tiene el mismo funcionamiento de users/index se encarga de crear una tabla con los roles creados y da opcion de crear/editar/eliminar.-->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de Roles</h2>
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
            <th>No</th>
            <th>Rol</th>
            <th width="235px">Acciones</th>
        </tr>
        
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-success" href="{{ route('roles.show',$role->id) }}">Mostrar</a>
                @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                @endcan
                @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
            @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Crear nuevo Rol</a>
             @endcan
     </div>

</div>


{!! $roles->render() !!}

@endsection