<?php 
    include_once 'conexion.php';
    $sql_leer = 'SELECT * FROM colores where estado=1';

    $gsent = $pdo->prepare($sql_leer);
    $gsent->execute();

    $resultado = $gsent->fetchAll();
   // var_dump($resultado);

   //AGREGAR
   if ($_POST) {
       # code...
       $color =  $_POST['color'];
       $descripcion = $_POST['descripcion'];

       $sql_agregar = 'INSERT INTO colores(color,descripcion,estado) values (?,?,1)';
       $sentencia_agergar = $pdo->prepare($sql_agregar);
       $sentencia_agergar->execute(array($color,$descripcion));

       
        $sentencia_agergar=null;
        $pdo=null;

       header('location:index.php');
   }

   //EDITAR
   if ($_GET) {
     $id = $_GET['id'];
    
    $sql_color = 'SELECT * FROM colores where id=?';
    $sentencia_color = $pdo->prepare($sql_color);
    $sentencia_color->execute(array($id));
    $resultado_color = $sentencia_color->fetch();

    $sentencia_color=null;
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>


    <div class="container pt-5">
    <div class="row">
        <div class="col-md-6">
        <?php  foreach ($resultado as $dato):?>
            <div class="alert alert-<?php echo $dato['color'] ?> " role="alert">
                <?php echo $dato['color']." - ".$dato['descripcion'] ?>

                <a href="eliminar.php?id=<?php echo $dato['id'] ?>"><i class="far fa-trash-alt float-right ml-2 "></i></a>
                <a href="index.php?id=<?php echo $dato['id'] ?>"><i class="fas fa-edit float-right  "></i></a>
         
            </div>

      

        <?php  endforeach ?>
        </div>

        <div class="col-md-6">

            <?php if(!$_GET): ?>
            <form method="POST">
                    <div class="form-group">
                        <input  class="form-control" id="color" name="color"  placeholder="Ingresar color">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="descripcion" name="descripcion" placeholder="Ingresar descripcion">
                    </div>
                <button type="submit" class="btn btn-success">AGREGAR ELEMENTOS</button>
            </form>
            <?php endif ?>

            <?php if($_GET): ?>
            <form method="GET" action="editar.php">
                    <div class="form-group">
                        <input  class="form-control" id="color" name="color"  placeholder="Ingresar color" value="<?php echo $resultado_color['color']  ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="descripcion" name="descripcion" placeholder="Ingresar descripcion" value="<?php echo $resultado_color['descripcion'] ?>">
                        <input type="hidden" name="id" value="<?php echo $resultado_color['id'] ?>">
                    </div>
                <button type="submit" class="btn btn-primary">EDITAR ELEMENTOS</button>
            </form>
            <?php endif ?>


        </div>
    </div>
        
    </div>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>