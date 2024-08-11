<x-admin-layout>
    <x-slot name="headTitle"><?php echo "Usuarios: Administradores" ?></x-slot>
    <div class="form">
        <form action="{{route('createUser')}}" method="POST">
            @csrf
            <input type="text" placeholder="Nombre: " name="nombre">
            <input type="text" placeholder="Apellido Paterno: " name="apellido_paterno">
            <input type="text" placeholder="Apellido Materno:" name="apellido_materno">
            <input type="email" placeholder="Email: " name="email" >
            <input type="text" placeholder="Telefono: " name="telefono">
            <input type="text" placeholder="Usuario: " name="usuario">
            <input type="password" placeholder="Contrasena: " name="password">
            <label for="tipo_usuario">Tipo de Usuario:</label>
        <select name="tipo_usuario" id="tipo_usuario">
            <option value="admin">Admin</option>
            <option value="enclab">Encargado de Laboratorio</option>
        </select>

        <button type="submit">Crear</button>
        </form>  
    </div>

    <div class="table">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Usuario</th>
                <th>Tipo de Usuario</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>


            @foreach($data as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nombre }}</td>
                    <td>{{ $user->apellido_paterno }}</td>
                    <td>{{ $user->apellido_materno }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telefono }}</td>
                    <td>{{ $user->usuario }}</td>
                    <td>{{ $user->tipo_usuario }}</td>
                    <td>
                        <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')" style="background: gray;">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="/admin/updateUser/{{$user->id}}">Actualizar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-admin-layout>