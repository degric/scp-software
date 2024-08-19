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
                border-bottom: 1px solid black;
            }
        </style>

        <h1>Crear Usuario</h1>
    </div>

    <div class="elements">
        <form action="{{ route('createUser') }}" method="POST">
            <div class="card cardOne">
                <div class="card-header">
                    <h2>Complete los Campos</h2>
                </div>
                <div class="card-body">
                    @csrf

                    <table class="tableUser">
                        <style>
                            .tableUser tr td,
                            .tableUser tr th {
                                width: 50vw;
                            }

                            .tableUser tr th {
                                text-align: right;
                                padding-right: 10px;
                            }
                        </style>
                        <tr>
                            <th>Nombre: </th>
                            <td><input type="text" placeholder="Usuario: " name="nombre"></td>
                        </tr>
                        <tr>
                            <th>Primer Apellido: </th>
                            <td><input type="text" placeholder="Primer Apellido: " name="apellido_paterno"></td>
                        </tr>
                        <tr>
                            <th>Segundo Apellido: </th>
                            <td><input type="text" placeholder="Segundo Apellido: " name="apellido_materno"></td>
                        </tr>
                        <tr>
                            <th>Usuario: </th>
                            <td><input type="text" placeholder="Usuario: " name="usuario"></td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td><input type="email" placeholder="Email: " name="email"></td>
                        </tr>
                        <tr>
                            <th>Teléfono: </th>
                            <td><input type="text" placeholder="Telefono" name="telefono"></td>
                        </tr>
                        <tr>
                            <th>Contraseña: </th>
                            <td><input type="password" placeholder="Contrasena: " name="password"></td>
                        </tr>
                        <tr>
                            <th>Tipo de Usuario: </th>
                            <td>
                                <select name="tipo_usuario" id="tipo_usuario">
                                    <option value="admin">Admin</option>
                                    <option value="enclab">Encargado de Laboratorio</option>
                                </select>
                            </td>
                        </tr>

                        <tr id="labSelection" style="display: none;">
                            <th>Laboratorios:</th>
                            <td>
                                @foreach($labs as $lab)
                                    <div>
                                        <input type="checkbox" name="labs[]" value="{{ $lab->id }}">
                                        <label>{{ $lab->nombre }}</label>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-update" style="background: green;" type="submit">Crear</button>
                    <a href="{{ route('showUsers') }}" class="btn btn-update" style="background: grey;  text-decoration: none">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('tipo_usuario').addEventListener('change', function () {
            var labSelection = document.getElementById('labSelection');
            if (this.value === 'enclab') {
                labSelection.style.display = '';
            } else {
                labSelection.style.display = 'none';
            }
        });

        window.addEventListener('load', function () {
            var tipoUsuario = document.getElementById('tipo_usuario').value;
            var labSelection = document.getElementById('labSelection');
            if (tipoUsuario === 'enclab') {
                labSelection.style.display = '';
            } else {
                labSelection.style.display = 'none';
            }
        });
    </script>

</x-admin-layout>
