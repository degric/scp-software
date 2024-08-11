<x-admin-layout>
    <x-slot name="headTitle"><?php echo 'Actualizar Usuario'; ?></x-slot>


    <div class="form">
        <form action="{{ route('updateUser', ['id' => $data->id]) }} " method="POST">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <th>Nombre: </th>
                    <td><input type="text" placeholder="{{ $data->nombre }}" name="nombre"></td>
                </tr>
                <tr>
                    <th>Primer Apellido: </th>
                    <td><input type="text" placeholder="{{ $data->apellido_paterno }}" name="apellido_paterno">
                    </td>
                </tr>
                <tr>
                    <th>Segundo Apellido: </th>
                    <td><input type="text" placeholder="{{ $data->apellido_materno }}" name="apellido_materno"></td>
                </tr>
                <tr>
                    <th>Usuario: </th>
                    <td><input type="text" placeholder="{{ $data->usuario }}" name="usuario"></td>
                </tr>
                <tr>
                    <th>Email: </th>
                    <td><input type="email" placeholder="{{ $data->email }}" name="email"></td>
                </tr>
                <tr>
                    <th>Telfono: </th>
                    <td><input type="text" placeholder="{{ $data->telefono }}" name="telefono"></td>
                </tr>
                <tr>
                    <th>Contrasena: </th>
                    <td><input type="password" placeholder="********" name="password"></td>
                </tr>
                <tr>
                    <th>Tipo de Usuario: </th>
                    <td><select name="tipo_usuario" id="tipo_usuario">

                            <option value="admin" {{ $data->tipo_usuario == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="enclab" {{ $data->tipo_usuario == 'enclab' ? 'selected' : '' }}>Encargado de
                                Laboratorio</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Fecha de Creacion: </th>
                    <td>{{ $dateCreated }}</td>
                </tr>
                <tr>
                    <th>Fecha de Actualizacion: </th>
                    <td>{{ $dateUpdated }}</td>
                </tr>
                <tr>
                    <td><button type="submit">Actualizar</button></td>
                </tr>
            </table>

        </form>
    </div>
</x-admin-layout>
