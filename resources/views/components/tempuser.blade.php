<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Red Utt</title>
    <!-- Option 1: Include in HTML -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!--link rel="stylesheet" href="href="{{ asset('css/TempUserController/styletu.css') }}" /-->
    <style>
        body {
    box-sizing: border-box;
    padding: 0px;
    margin: 0%;
    
}

.btn-login{
    position: fixed;
    margin: 10px;
}
.container-fluid {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;

}

.progress {
    width: 50vw;
    margin-bottom: 5vw;
}


    </style>
  </head>

  <body>
    <!--Boton para login-->
    <button type="button" class="btn-login btn btn-outline-secondary">
      <i class="bi bi-three-dots-vertical success"></i>
    </button>

    <!--Informacion Sobre la conexion-->

    <div class="container-fluid full-height bg-light">
      <div
        class="progress"
        role="progressbar"
        aria-label="Success example"
        aria-valuenow="25"
        aria-valuemin="0"
        aria-valuemax="100"
      >
        <div class="progress-bar bg-success" style="width: {{$networkState ?? 'Unknow' }}%">
          {{$networkState ?? 'Unknow'}}%
        </div>
      </div>

      <div class="card" style="width: 50vw">
        <div class="card-body">
          <h5 class="card-title text-center">Conectado a la red</h5>
          <p class="card-text text-center"></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">IP: {{$ip ?? 'Unknow'}}</li>
          <li class="list-group-item">Nombre de la red: {{$network_name ?? 'Unknow'}}</li>
        </ul>
        <div class="card-body text-center">
          <a href="#" class="card-link">Comentarios Y Sugerencias</a>
        </div>
      </div>
    </div>

    <!--Scripts-->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
