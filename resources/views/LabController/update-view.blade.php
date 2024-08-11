<x-admin-layout>
    <x-slot name="headTitle">Actualizar Laboratorio</x-slot>
    <form action="{{route('updateLab' , ['id' => $data->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="table">
            <table>
                <tr>
                    <th>Nombre: </th>
                    <td><input type="text" name="nombre" placeholder="{{ $data->nombre }}"></td>
                </tr>
                <tr>
                    <th>Planta: </th>
                    <td><input type="text" name="planta" placeholder="{{ $data->planta }}"></td>
                </tr>
                <tr>
                    <th>Red: </th>
                    <td><input type="text" name="red" placeholder="{{ $data->red }}"></td>
                </tr>
                <tr>
                    <th>Mascara de red: </th>
                    <td><input type="text" name="mascara_red" placeholder="{{ $data->mascara_red }}"></td>
                </tr>
                <tr><th>Creacion: </th><td>{{$data->created_at}}</td></tr>
                <tr><th>Actualizado: </th><td>{{$data->updated_at}}</td></tr>
                <tr><td><input type="submit" value="Actualizar"></td></tr>
            </table>
        </div>
    </form>
</x-admin-layout>
