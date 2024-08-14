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

        <h1>Crear Laboratorio </h1>



    </div>

    <div class="elements">


        <form action="{{ route('createLab') }}" method="POST">
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
                                padding-right: 10px
                            }
                        </style>
                        <tr>
                            <th>Nombre: </th>
                            <td><input type="text"  name="nombre"></td>
                        </tr>
                        <tr>
                            <th>Planta: </th>
                            <td><input type="text"  name="planta">
                            </td>
                        </tr>
                        <tr>
                            <th>Ip: </th>
                            <td><input type="text"  name="red"></td>
                        </tr>
                        <tr>
                            <th>Mascara de Red: </th>
                            <td><input type="text"  " name="mascara_red"></td>
                        </tr>



                    </table>


                </div>
                <div class="card-footer">

                    <button class="btn btn-update" style="background: green;" type="submit">Crear</button>


                    <a href="{{ url('/admin/labs') }}" class="btn btn-update"
                        style="background: grey;  text-decoration: none">Cancelar</a>

                </div>
            </div>
        </form>


    </div>
</x-admin-layout>
