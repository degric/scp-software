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

        <h1>Dispositivos en: {{$lab->nombre }} </h1>
        

    </div>

    <div class="elements">
        @foreach ($computers as $computer)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $computer->id }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>IP:</strong>
                        {{ $computer->ip }}</p>
                    <p><strong>MAC: </strong> {{ $computer->mac }}</p>
                    <p><strong>Sistema Operativo: </strong> {{ $computer->sistema_operativo }}</p>
                </div>
                <div class="card-footer">
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete">Eliminar</button>
                    </form>

                    <form action="" method="GET" style="display:inline;">
                        <button class="btn btn-update">Actualizar</button>
                    </form>
                    <a href="" class="btn btn-update" style="background: blue;  text-decoration: none;">Administrar</a>

                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
