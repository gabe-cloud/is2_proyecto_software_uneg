@extends('layouts.app') <!-- Se exporta la vista layouts-->

<!-- Esta carpeta scores solo es creada de guia a la hora de realizar vistas de CRUD para que observen como esta estructurada 
y como se llamadan los valores y rutas, no tiene relacion con el proyecto-->


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cursos Cargados</h2>
            </div>
            <div class="pull-right">
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
            <th class=" text-white">ID</th>
            <th class=" text-white">Cantidad Alumnos</th>
            <th class=" text-white">Tipo</th>
            <th class=" text-white">Horario</th>
            <th width="280px" class=" text-white">>Acciones</th>
        </tr>
        @foreach ($scores as $score)
        <tr>
            <td class=" text-white">{{ $score->id }}</td>
            <td class=" text-white">{{ $score->ci }}</td>
            <td class=" text-white">{{ $score->type }}</td>
            <td class=" text-white">{{ $score->phone_number }}</td>
            <td>
                <form action="{{ route('course-scores.destroy',$score->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('course-scores.show',$score->id) }}">verr</a>



                </form>
            </td>
        </tr>
        @endforeach
    </table>


    


@endsection