@extends('layouts.app') <!-- Se exporta la vista layouts-->

@section('content')
   <div class="row">
        <div class="col-lg-auto margin-tb">
            <div class="pull-left">
                <h2>Datos de estudiante</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Regresar</a>
            </div>
        </div>
    </div>


    <div class="row mt-2">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Nombre</strong>
                Monkey D. Luffy
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>cedula</strong>
                3.000.000.000
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Estudiante:</strong>
                {{ $student->datos->name }} {{ $student->datos->last_name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Semestre:</strong>
                {{ $student->semestre->semester_number }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Carrera:</strong>
                {{ $student->carrera->name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Fecha:</strong>
                {{ $student->date_admission }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2">
            <div class="form-group">
                <strong>Status:</strong>
                <span class="bg-primary p-1 rounded">{{ $student->status }}</span>
            </div>
        </div>
    </div>

    <div class="border border-info mt-3">
        <strong class="text-primary m-2">Direccion:</strong>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit labore vel ut expedita aspernatur natus commodi officiis hic vero quisquam magnam quam consequuntur, earum distinctio odit aliquid a tempora molestias.
        <div class="float-left">
            <ul>
                <li>informacion x: respuesta x</li>
                <li>informacion x: respuesta x</li>
                <li>informacion x: respuesta x</li>
                <li>informacion x: respuesta x</li>
            </ul>
        </div>

        <div class="float-right">
            <ul>
                <li>informacion x: respuesta x</li>
                <li>informacion x: respuesta x</li>
                <li>informacion x: respuesta x</li>
                <li>informacion x: respuesta x</li>
            </ul>
        </div>
    </div>

@endsection
