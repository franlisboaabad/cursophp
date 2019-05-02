<?php 
    include_once 'conexion.php';

    $sql_leer = 'SELECT * FROM usuarios';

    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();

    $resultado = $gsent->fetchAll();


    if ($_POST) {
        # code...

        $nombres =  $_POST['nombres'];
        $direccion = $_POST['direccion'];
        $celular = $_POST['celular'];
        $correo = $_POST['correo'];

        $sql_agregar = 'INSERT INTO usuarios(nombres,direccion,celular,email,estado) values (?,?,?,?,1)';
        $sentencia_agergar = $pdo->prepare($sql_agregar);
        $sentencia_agergar->execute(array($nombres,$direccion,$celular,$correo));
     
        header('location:documento.php');
    }


?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">APLICATIVO PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">INICIO <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="documento.php">DOCUMENTO</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            
            </ul>
        </div>
    </nav>

    
    <section class="div container pt-5">
        <p>REGISTRO DE USUARIOS</p>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <form method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingresar Nombres">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su Direccion">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="celular" name="celular" placeholder="Ingresar Celular">
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresar correo electronico">
                    </div>
                    <button type="submit" class="btn btn-success">REGISTRAR USUARIO</button>
                </form>
            </div>

            <div class="col-md-6">
            <?php  foreach ($resultado as $dato):?>
                <div class="alert alert-primary" role="alert">
                    <?php echo  $dato['nombres']." ".$dato['direccion']." ".$dato['celular']." ".$dato['email']; ?>
                </div>
            <?php  endforeach ?>
            </div>
        </div>
       
    </section>


    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>