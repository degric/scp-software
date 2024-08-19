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

        <h1>Dispositivos en: {{$network->nombre}} </h1>
       
    </div>
    
    <div class="elements">
        @foreach ($devices as $device)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $device->ip }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Direccion IP: 
                    </strong>
                        {{ $device->ip }}</p>
                    
                    <p><strong>MAC: </strong> {{ $device->mac  }}</p>
                    <p><strong>Fechad de conexion: </strong> {{ $device->fecha_conexion  }}</p>
                    <p><strong>Sistema Operativo: </strong> {{ $device->sistema_operativo  }}</p>
                </div>
                <div class="card-footer">
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete">Desconectar</button>
                    </form>

                    
                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
