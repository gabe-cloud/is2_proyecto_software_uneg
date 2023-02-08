@extends('layouts.app') <!-- Se exporta la vista layouts-->

<!-- Esta carpeta products solo es creada de guia a la hora de realizar vistas de CRUD para que observen como esta estructurada 
y como se llamadan los valores y rutas, no tiene relacion con el proyecto-->


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de Producto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Regresar</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalles:</strong>
                {{ $product->detail }}
            </div>
        </div>
    </div>
@endsection
