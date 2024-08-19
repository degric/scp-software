<x-enclab-layout :data="$data">

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

        <h1>Laboratorios </h1>
        


    </div>

    <div class="elements">
        @foreach ($data->labs as $lab)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $lab->nombre }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Nombre Del Laboratorio</strong>
                        {{ $lab->nombre }}</p>
                    <p><strong>Planta: </strong> {{ $lab->planta }}</p>
                    <p><strong>Red: </strong> {{ $lab->red . '/' . $lab->mascara_red }}</p>
                </div>
                <div class="card-footer">
                  

                    
                    <a href="/enclab/lab/{{$lab->id}}" class="btn btn-update" style="background: blue;  text-decoration: none;">Administrar</a>

                </div>
            </div>
        @endforeach
    </div>
</x-enclab-layout>
