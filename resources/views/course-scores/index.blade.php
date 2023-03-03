@extends('layouts.app') <!-- Se exporta la vista layouts-->

<!-- Esta carpeta scores solo es creada de guia a la hora de realizar vistas de CRUD para que observen como esta estructurada 
y como se llamadan los valores y rutas, no tiene relacion con el proyecto-->


@section('content')
<div class="container">
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


    <table class="table bg-secondary p-2 table-bordered">
        <tr>
            <th class=" text-white">ID</th>
            <th class=" text-white">Cantidad Alumnos</th>
            <th class=" text-white">Tipo</th>
            <th class=" text-white">Horario</th>
            <th width="100px" class=" text-white">Dia</th>
            <th width="60px" class=" text-white">accion</th>
            
        </tr>
        @foreach ($prof_scoring as $score)
        <tr>
            <td class=" text-white">{{ $score->id }}</td>
            <td class=" text-white">{{ $score->student_count }}</td>
            <td class=" text-white">{{ $score->type }}</td>
            <td class=" text-white">{{ $score->entry_time }} a {{ $score->departure_time }}</td>
            <td class=" text-white">{{ $score->day }}</td>
             <td>
               
                <form action="{{ route('course-scores.destroy',$score->id) }}" method="POST">
                    <a class="btn btn-success" href="{{ route('course-scores.show',$score->id) }}">ver</a>
                </form> 
                
            </td>
        </tr>
        @endforeach
    </table>


    

</div>
@endsection