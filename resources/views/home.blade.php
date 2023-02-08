<!-- Vista de /home como se puede observa lo primero que hace es exportar la vista de layouts.app para que el navbar este de primero funcionaria
header para cada vista del programa -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tablero') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido al sistema de la UNEG') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
