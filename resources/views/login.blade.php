<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header>
      
    </header>
    <div class="login-container">
        <h2>Inicio de Sesión</h2>
        <form action="{{route('login')}}" method="POST" class="form">
            @csrf
        
            <input type="text" id="usuario" name="usuario" placeholder="Usuario " required>

            <input type="password" id="password" name="password" placeholder="Contraseña " required>

            <button type="submit">Iniciar Sessión</button>
        </form>
    </div>


</body>
</html>