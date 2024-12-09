<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Importar la fuente de iconos de Google -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Importar materialize.css -->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <!-- Importar SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Configuración para vista en dispositivos móviles -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Título de la página -->
  <title>Inicio de Sesión</title>
</head>
<body class="card-content #01579b light-blue darken-4">
  <main>
    <div class="row">
      <!-- Logo de la universidad -->
      <div class="input-field col s12 center">
        <img src="./img/uaclogop.png" width="200" class="circle">
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content #90caf9 blue lighten-3">
              <h1>
                <span class="card-title"><center><a href="" class="white-text">LOGIN DE ACCESO FUNCIONES</a></h1>
              </span>
              <span class="card-title"><center><a href="" class="black-text">Inicio de Sesión</a></center></span>
              
              <!-- Formulario de inicio de sesión -->
                <form id="login-form" method="POST">
                    <div class="input-field">
                        <i class="material-icons prefix">perm_identity</i>
                        <input type="email" name="usuario" id="usuario" required pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$" autofocus>
                        <label for="usuario">Correo electrónico</label>
                    </div>

                    <div class="input-field">
                        <i class="material-icons prefix">vpn_key</i>
                        <input type="password" name="contra" id="contra" required pattern="[A-Za-z0-9]{1,50}">
                        <label for="contra">Contraseña</label>
                    </div>

                <!-- Enlace para recuperar contraseña -->
                <div>
                  <button class="btn waves-effect waves-light red right darken-3" type="button" id="forgot-password">¿Olvidó su contraseña?</button>
                </div>

                <!-- Botón para acceder -->
                <div>
                  <button class="btn waves-effect waves-light blue darken-3" type="submit">Acceder</button>
                </div>
              </form>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </main>

  <!-- Scripts de dependencias -->
  <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="./js/materialize.min.js"></script>
  <!-- Incluir el archivo JS con la lógica de inicio de sesión -->
  <script type="text/javascript" src="./js/login.js"></script>
</body>
</html>
