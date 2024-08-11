<x-admin-layout>
    <x-slot name="headTitle">Laboratorios</x-slot>

    <form action="{{route('createLab')}}" method="POST">
        @csrf
        @method('POST')
        
        <table>
        <tr>
            <th>Nombre: </th>
            <td><input type="text" name="nombre"></td>

        </tr>
        <tr>
            <th>Planta: </th>
            <td><input type="text" name="planta"></td>

        </tr>
        <tr>
            <th>Red: </th>
            <td><input type="text" name="red"></td>
        </tr>
        <tr>
            <th>Mascara de red: </th>
            <td><input type="text" name="mascara_red"></td>
        </tr>
        <tr>
            <td><button type="submit">Crear</button></td>
        </tr>
    </table>
    </form>
</x-admin-layout>