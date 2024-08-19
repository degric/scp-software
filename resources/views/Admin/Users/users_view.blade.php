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

        <h1>Usuarios </h1>
        <h3><a href="{{ route('showCreateForm') }}" style="text-decoration: none; color: black;">Crear</a></h3>


    </div>

    <div class="elements">
        @foreach ($data->users as $user)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $user->usuario }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Nombre Completo:</strong>
                        {{ $user->nombre . ' ' . $user->apellido_paterno . ' ' . $user->apellido_materno }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $user->telefono }}</p>
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

                    <form action="/admin/user/updateUser/{{ $user->id }}" method="GET" style="display:inline;">
                        <button class="btn btn-update">Actualizar</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
