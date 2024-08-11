<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/AdminController/style.css') }}">
</head>

<body>
    <header>
        <h1></h1>
        <h1>{{$headTitle}}</h1> <a href="{{route('logout')}}"><i class="bi bi-person-circle"></i></a>
    </header>
    <div class="container">
        <div class="menus">
            <ul>
                <li><button class="btn-principal">Usuarios</button></li>

                <ul>
                    <li><a class="btn-sec" href="/admin/users/admins">Administradores</a></li>
                    <li><a href="/admin/encLabs" class="btn-sec">Encargados</a></li>
                </ul>
            </ul>
            
            <ul>
                <li><button class="btn-principal">Laboratorios</button></li>

                <ul>
                    <li><a class="btn-sec" href="/admin/lab/create">Crear</a></li>
                    <li><a href="/admin/lab/management" class="btn-sec">Gestionar</a></li>
                </ul>
            </ul>

            <ul>
                <li><button class="btn-principal">Redes</button></li>

                <ul>
                    <li><a class="btn-sec" href="">Administradores</a></li>
                    <li><a href="" class="btn-sec">Encargados</a></li>
                </ul>
            </ul>

        </div>


        <div class="content">
            {{$slot}}
        </div>
    </div>
</body>

</html>
