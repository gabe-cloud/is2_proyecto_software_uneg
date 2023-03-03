@extends('layouts.app') <!-- Se exporta la vista layouts-->
<!-- Vista se encarga de mostrar todos los datos los usuarios registrados en una table-->
@section('content')  
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Gestión de usuarios</h2>
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
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th width="250px">Acciones</th>
            </tr>
            <tbody>
                @foreach ($data as $key => $user) <!--Funciona como un for-->
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label>{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td> <!-- Botones que estan en la tabla-->
                            <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">Mostrar</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editar</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            <tbody>
        </table>

        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Crear nuevo Usuario</a>
        </div>
    </div>
{!! $data->render() !!}

@endsection