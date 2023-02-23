<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <p class="text-center"><img src="{{asset('img/LOGO_UNEG.jpg')}}" alt="logo uneg" width="150px" height="150px"></p>
        <h5 class=" font-weight-bold text-center">Constancia de Notas</h5>
        <h6>Nombre: {{$mis_datos->name}} </h6>    
        <h6>Apellido:  {{$mis_datos->last_name}} </h6>
        <h6>C.I: {{$mis_datos->ci}} </h6>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Asignatura</th>
                    <th>Nota final</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse ($notas as $nota)
                <tr>
                    <td>{{$nombre_asig[$i++]}}</td>
                    <td>{{$nota->nota_final}} </td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
        <p>Fecha: {{date('Y-m-d')}}</p>
    </div>
</body>

</html>