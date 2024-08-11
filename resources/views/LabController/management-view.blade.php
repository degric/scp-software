<x-admin-layout>
    <x-slot name="headTitle">Gestionar Laboratorios</x-slot>


<div class="table">
    <table>
    <thead>
        <tr>
            <th>ID</th>
        <th>Nombre</th>
        <th>Planta</th>
        <th>Red</th>
        <th>Mascara</th>
        <th>Creado</th>
        <th>Actualizado</th>
        <th>Actualizar</th>
        <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $lab)
        <tr>
            <td>{{ $lab->id }}</td>
            <td>{{ $lab->nombre }}</td>
            <td>{{ $lab->planta }}</td>
            <td>{{ $lab->red }}</td>
            <td>{{ $lab->mascara_red }}</td>
            <td>{{ $lab->created_at }}</td>
            <td>{{ $lab->updated_at }}</td>
            <td>
                <a href="/admin/lab/update/{{$lab->id}}">Actualizar</a>
            </td>
            <td><form action="{{ route('deleteLab', ['id' => $lab->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar el laboratorio?')" style="background: gray;">Eliminar</button>
            </form></td>

        </tr>
    @endforeach
    </tbody>
</table>
</div>
</x-admin-layout>