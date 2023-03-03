@extends('layouts.app')  <!-- Se exporta la vista layouts-->

 <!-- Esta vista no modifiquen sus rutas ya esta lista, lo que si pueden los de Front es mejorar la visualización mediante css o
como prefieran.-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Datos de Rol</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Rol:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-auto col-sm-auto col-md-auto border border-info p-2 bg-secondary">
            <div class="form-group">
                <strong>Permisos de Rol:</strong>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div> 
        <div class="pull-right text-center">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Atras</a>
        </div>
    </div>
</div>
@endsection