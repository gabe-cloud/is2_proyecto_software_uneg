<!-- Vista de /home como se puede observa lo primero que hace es exportar la vista de layouts.app para que el navbar este de primero funcionaria
header para cada vista del programa -->
@extends('layouts.app')

@section('content')

<section id="opciones" class="opciones">
    <div class="contenido-seccion">
        <h2>BIENVENIDO</h2>
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
                @role('student')
                    <h3>
                        <strong>Estudiante</strong>
                    </h3>
                    @endrole
                    @role('Admin')
                    <h3>
                        <strong>Administrador</strong>
                    </h3>
                    @endrole
                    @role('professor')
                    <h3>
                        <strong>Profesor</strong>
                    </h3>
                    @endrole
                    @role('coordinator')
                    </h3>
                        <strong>Coordinador</strong>
                    </h3>
                    @endrole
                    @if(isset($people[0]) && !empty($people[0]))
                <ul>
                    <li>
                        <strong>Nombre y apellido</strong>
                        {{ $people[0]->name }}
                        {{ $people[0]->last_name }}
                    </li>
                    <li>
                        <strong>Telefono</strong>
                        {{ $people[0]->phone_number }}
                    </li>
                    <li>
                        <strong>E-mail</strong>
                        {{ $people[0]->email }}
                    </li>
                    <li>
                        <strong>Direccion</strong>
                        {{ $people[0]->address }}
                    </li>
                    @role('professor')
                    <li>
                        <strong>Tipo</strong>
                        <span>{{ $people[0]->professor_type}}    </span>                    
                    </li>
                    <li>
                        <strong>Profesion</strong>
                        {{ $people[0]->profession}}                      
                    </li>
                    @endrole
                    @role('coordinator')
                    <li>
                        <strong>Tipo</strong>
                        <span> {{ $people[0]->appointment}}</span>                        
                    </li>
                    @endrole
                    @role('student')

                    <li>
                        <strong>Status</strong>
                        <span> {{ $people[0]->status}}</span>                        
                    </li>
                    @endrole
                </ul>
                @else
                    <h1>No tienes datos personales</h1>
                @endif
            </div>

            <!--opcion-->
            <div class="col">
                <h3>Menu de opciones</h3>
                <div class="contenedor-opcion">
                    @role('coordinator|Admin')
                        @role('Admin')  
                        <div class="opcion">
                            <i class="fa-solid fa-gamepad"></i>
                            <span><a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a></span>
                        </div>
                        @endrole
                        @can('role-list')  
                        <div class="opcion">
                            <i class="fa-solid fa-gamepad"></i>
                            <span><a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a></span>
                        </div>
                        @endcan
                        @can('person-list')
                        <div class="opcion">
                            <i class="fa-solid fa-gamepad"></i>
                            <span><a class="dropdown-item" href="{{ route('people.index') }}">Personas</a></span>
                        </div>
                        @endcan   
                        @can ('coordinator-list')
                        <div class="opcion">
                            <i class="fa-solid fa-gamepad"></i>
                            <span><a class="dropdown-item" href="{{ route('coordinators.index') }}">Coordinadores</a> </span>
                        </div>
                        @endcan  
                        <div class="opcion">
                            <i class="fa-solid fa-gamepad"></i>
                            <span><a class="dropdown-item" href="{{ route('professors.index') }}">Profesores</a> </span>
                        </div>
                        
                        @can ('student-list')
                        <div class="opcion">
                            <i class="fa-solid fa-gamepad"></i>
                            <span><a class="dropdown-item" href="{{ route('students.index') }}">Estudiantes</a>  </span>
                        </div>
                        @endcan  
                    @endrole

                    @can('schedule-list') 
                    <div  class="opcion">
                        <i class="fa-solid fa-book"></i>
                        <span><a class="dropdown-item" href="{{ route('schedules.index') }}">Horarios</a> </span>
                    </div>
                    @endcan

                    @can('career-list') 
                    <div class="opcion">
                        <i class="fa-solid fa-puzzle-piece"></i>
                        <span><a class="dropdown-item" href="{{ route('careers.index') }}">Carreras</a></span>
                    </div>
                    @endcan

                    @can('section-list')
                    <div class="opcion">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span> <a class="dropdown-item" href="{{ route('sections.index') }}">Secciones</a> </span>
                    </div>
                    @endcan

                    @can('course-list') 
                    <div class="opcion">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span> <a class="dropdown-item" href="{{ route('courses.index') }}">Cursos</a> </span>
                    </div>
                    @endcan

                    @can('score-list') 
                    <div class="opcion">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <span> <a class="dropdown-item" href="{{ route('scores.index') }}">Notas</a> </span>
                    </div>
                    @endcan

                    @role('student')
                        <div class="opcion">
                            <i class="fa-solid fa-tv"></i>
                            <span><a class="dropdown-item" href="{{ route('incriptions.index') }}">Mis datos</a> </span>
                        </div>

                        <div class="opcion">
                            <i class="fa-solid fa-chess-rook"></i>
                            <span><a class="dropdown-item" href="{{ route('incriptions.create') }}">Inscribir</a></span>
                        </div>

                        <div class="opcion">
                            <i class="fa-solid fa-dragon"></i>
                            <span> <a class="nav-link" href="{{ route('horario.mi_horario') }}">Mi Horario</a></span>
                        </div>

                        <div class="opcion">
                            <i class="fa-solid fa-flask"></i>
                            <span><a class="nav-link" href="{{ route('notas.notas_estudiantes') }}">Notas</a></span>
                        </div>
                    @endrole
                     <!--
                         <div class="opcion">
                            <i class="fa-solid fa-flask"></i>
                            <span>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('SALIR') }}
                                    </a>
                            </span>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>--->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
