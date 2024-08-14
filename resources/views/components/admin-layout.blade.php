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
        <h1>SCP-System/Admin</h1> <a href="{{ route('logout') }}"><i class="bi bi-person-circle"></i></a>
    </header>
    <div class="container">
        <div class="menus">
            <ul>
                <li>


                    <form action="{{ url('/admin/users') }}" method="GET">
                        <button type="submit" class="btn-principal">Usuarios</button>
                    </form>


            </ul>

            <ul>
                <li><form action="{{url('/admin/labs')}}" method="GET"><button class="btn-principal" type="submit">Laboratorios</button></form></li>
                <ul>
                    @foreach ($data->labs as $lab)
                        <li>
                            <a href="" class="btn-sec">{{ $lab->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </ul>

            <ul>
                <li><form action="{{url('/admin/networks')}}" method="GET"><button class="btn-principal" type="submit">Redes</button></form></li>

                <ul>
                    @foreach ($data->networks as $net)
                        <li>
                            <a href="" class="btn-sec">
                                {{ $net->nombre }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </ul>

        </div>


        <div class="content">
            {{$slot}}
        </div>
    </div>
</body>

</html>
