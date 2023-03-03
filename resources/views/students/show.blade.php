@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
<div class="container">
   <div class="row">
        <div class="col-lg-auto margin-tb">
            <div class="pull-left">
                <h2>Datos de estudiante</h2>
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Estudiante:</strong>
                {{ $student->datos->name }} {{ $student->datos->last_name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Semestre:</strong>
                {{ $student->semestre->semester_number }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Carrera:</strong>
                {{ $student->carrera->name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Fecha:</strong>
                {{ $student->date_admission }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Status:</strong>
                <span class="bg-info p-1 rounded">{{ $student->status }}</span>
            </div>
        </div>
    </div>

    <div class="border border-info mt-3 bg-secondary">
        <strong>Direccion:</strong>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit labore vel ut expedita aspernatur natus commodi officiis hic vero quisquam magnam quam consequuntur, earum distinctio odit aliquid a tempora molestias.
        <div>
            <ul>
                <li>Servicio comunitario: pendiente</li>
                <li>Pasantia: pendiente</li>
                <li>Trabajo de grado: pendiente</li>
            </ul>
        </div>
    </div>
</div>

    <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pensum</h2>
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
            <th>Semestre</th>
            <th>codigo</th>
            <th>Materia</th>
            <th>Status</th>
            <th>Nota</th>
            <th>prelacion</th>
            <th>veces vista</th>
        </tr>
        <tr>
            <td>1</td>
            <td>10772</td>
            <td>matematica 1</td>
            <td>aprobado</td>
            <td>8</td>
            <td>-</td>
            <td>x</td>

        </tr>
        <tr>
            <td>2</td>
            <td>10773</td>
            <td>matematica 3</td>
            <td>en curso</td>
            <td>-</td>
            <td>10772</td>
            <td>x</td>

        </tr>
        <tr>
            <td>3</td>
            <td>10774</td>
            <td>matematica 3</td>
            <td>pendiente</td>
            <td>-</td>
            <td>10773</td>
            <td>x</td>

        </tr>
    </table>

     <div class="pull-right text-center">
        <a class="btn btn-primary" href="{{ route('students.index') }}"> Atras</a>
    </div>

</div>

@endsection
