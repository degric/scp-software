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

        <h1>Redes </h1>
        <h3><a href="{{ route('showCreateFormNetwork') }}" style="text-decoration: none; color: black;">Crear</a></h3>


    </div>

    <div class="elements">
        @foreach ($data->networks as $net)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $net->nombre }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Nombre
                    </strong>
                        {{ $net->nombre }}</p>
                    
                    <p><strong>Red: </strong> {{ $net->ip . '/' . $net->mascara_red }}</p>
                </div>
                <div class="card-footer">
                    <form action="{{route('deleteNetwork', ['id' => $net->id])}}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete">Eliminar</button>
                    </form>

                    <form action="{{route('showUpdateNetwork', ['id'=>$net->id])}}" method="GET" style="display:inline;">
                        <button class="btn btn-update">Actualizar</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
</x-admin-layout>
