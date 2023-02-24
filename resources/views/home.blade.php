<!-- Vista de /home como se puede observa lo primero que hace es exportar la vista de layouts.app para que el navbar este de primero funcionaria
header para cada vista del programa -->
@extends('layouts.app')

@section('content')
<section id="opciones" class="opciones">
    <div class="contenido-seccion">
        <h2>BIENVNIDO</h2>
        
        <p>La <span>Universidad Nacional Experimental de Guayana</span> esta feliz de que formes parte de la poblacion estudiantil, en este sistema encontraras todas las opciones para gestionar tu informació</p>

        @if ($message = Session::get('Error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
        

        <div class="fila">
            <!--datos personales-->
            <div class="col">
                <h3>Datos Pesonales</h3>
                <ul>
                    <li>
                        <strong>Cumpleaños</strong>
                        07-07-1998
                    </li>
                    <li>
                        <strong>Telefono</strong>
                        +58-424-9162687
                    </li>
                    <li>
                        <strong>Website</strong>
                        example.com
                    </li>
                    <li>
                        <strong>Direccion</strong>
                        Una direccion cualquiera
                    </li>
                    <li>
                        <strong>Cargo</strong>
                        <span>FREELANCE</span>
                    </li>
                </ul>
            </div>

            <!--opcion-->
            <div class="col">
                <h3>opcion</h3>
                <div class="contenedor-opcion">
                    <div class="opcion">
                        <i class="fa-solid fa-gamepad"></i>
                        <span>ZELDA</span>
                    </div>

                    <div class="opcion">
                        <i class="fa-solid fa-book"></i>
                        <span>ZELDA</span>
                    </div>

                    <div class="opcion">
                        <i class="fa-solid fa-puzzle-piece"></i>
                        <span>ZELDA</span>
                    </div>

                    <div class="opcion">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span>ZELDA</span>
                    </div>

                    <div class="opcion">
                        <i class="fa-solid fa-tv"></i>
                        <span>SERIES</span>
                    </div>

                    <div class="opcion">
                        <i class="fa-solid fa-chess-rook"></i>
                        <span>AJEDREZ</span>
                    </div>

                    <div class="opcion">
                        <i class="fa-solid fa-dragon"></i>
                        <span>FANTASIA</span>
                    </div>

                    <div class="opcion">
                        <i class="fa-solid fa-flask"></i>
                        <span>CIENCIA</span>
                    </div>
                </div>
            </div>
        </div>
        <button>
            descargar CV <i class="fa-solid fa-download"></i>
            <span class="overlay"></span>
        </button>
    </div>
</section>
@endsection
