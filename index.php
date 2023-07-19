<?php include 'controlador/controlador_login.php'?>

<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Nuevas Páginas</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="icon" href="img/logo.png">
      <link rel="stylesheet" href="css/css-header.css?0.1">
      <link rel="stylesheet" href="css/css-login.css?0.2">
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>      
  </head>

  <body>
    <header>
      <a href="#" class = "a__logo">
        <img src="img/logo.png" class = "logo" alt="Logo" width="15%">
        <h1 class = "logo colorWhite">NUEVAS PÁGINAS</h1>
      </a>

      <a href = "#"><button class = "btnGanancias" id = "btnGananciasInicio">Registro</button></a>
    </header>

    <div class="bg-image"></div>
    
    <div class = "container-login">
        <div class="div-formulario-login">
            <form action="" method="post">
                <h4 class = "mb-2">Inicio de sesión</h4>
                <?php echo $respuesta; ?>
                <hr>
                
                <div class = "flex-column mb-5">                    
                    <div>
                        <label for="email">Email</label>
                    </div>
                    <div>
                        <input type="text" class = "input-login" id = "usuario" name = "usuario" value = "">
                    </div>
                </div>

                <div class = "flex-column">
                    <div>
                        <label for="password">Contraseña</label>
                    </div>
                    <div>
                        <input type="password" class= "input-login" id = "password" name = "password" value = "">
                    </div>
                </div>

                <div>
                    <input type="submit" class = "btn-login" id = "btn-ingresar" name = "btn-ingresar" value = "Ingresar">
                </div>
            </form>
        </div>
    </div>
    
  </body>