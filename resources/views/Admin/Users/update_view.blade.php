<x-admin-layout :data="$data">

    <div class="headerUsers">
        <style>
            .headerUsers {
                width: 80vw;
                display: flex;
                justify-content: space-between;
                flex-direction: row;
                flex-wrap: nowrap;
                padding: 0px 20px;
                border-bottom: 1px solid black
            }
        </style>

        <h1>Actualizar Usuario</h1>



    </div>
    <div class="elements">
        <form action="{{ route('updateUser', ['id' => $user->id]) }}" method="POST">
            <div class="card cardOne">
                <div class="card-header">
                    <h2>{{ $user->usuario }}</h2>
                </div>
                <div class="card-body">

                    @csrf
                    @method('PUT')
                    <table class="tableUser">
                        <style>
                            .tableUser tr td,
                            .tableUser tr th {

                                width: 50vw;
                            }

                            .tableUser tr th {
                                text-align: right;
                                padding-right: 10px
                            }
                        </style>
                        <tr>
                            <th>Nombre: </th>
                            <td><input type="text" placeholder="{{ $user->nombre }}" name="nombre"></td>
                        </tr>
                        <tr>
                            <th>Primer Apellido: </th>
                            <td><input type="text" placeholder="{{ $user->apellido_paterno }}"
                                    name="apellido_paterno">
                            </td>
                        </tr>
                        <tr>
                            <th>Segundo Apellido: </th>
                            <td><input type="text" placeholder="{{ $user->apellido_materno }}"
                                    name="apellido_materno"></td>
                        </tr>
                        <tr>
                            <th>Usuario: </th>
                            <td><input type="text" placeholder="{{ $user->usuario }}" name="usuario"></td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td><input type="email" placeholder="{{ $user->email }}" name="email"></td>
                        </tr>
                        <tr>
                            <th>Telfono: </th>
                            <td><input type="text" placeholder="{{ $user->telefono }}" name="telefono"></td>
                        </tr>
                        <tr>
                            <th>Contrasena: </th>
                            <td><input type="password" placeholder="********" name="password"></td>
                        </tr>
                        <tr>
                            <th>Tipo de Usuario: </th>
                            <td><select name="tipo_usuario" id="tipo_usuario">

                                    <option value="admin" {{ $user->tipo_usuario == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="enclab" {{ $user->tipo_usuario == 'enclab' ? 'selected' : '' }}>
                                        Encargado de
                                        Laboratorio</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Fecha de Creacion: </th>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de Actualizacion: </th>
                            <td>{{ $user->updated_at }}</td>
                        </tr>

                    </table>


                </div>
                <div class="card-footer">

                    @if ($user->usuario !== 'admin')
                        <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">Eliminar</button>
                        </form>
                    @endif


                    @method('PUT')
                    <button class="btn btn-update" type="submit">Actualizar</button>


                    <form action="{{ url('/admin/users') }}" method="GET" style="display:inline;">


                        <button class="btn btn-update">Cancelar</button>
                    </form>

                </div>
            </div>
        </form>

    </div>
</x-admin-layout>
