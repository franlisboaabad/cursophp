<?php 
    
    include_once 'conexion.php';

    $sql_leer = 'SELECT * FROM personas where estado = 1';
    $sentencia_leer = $pdo->prepare($sql_leer);
    $sentencia_leer->execute();

    $resultado = $sentencia_leer->fetchAll();

    //AGREGAR 

    if ($_POST) {
       
    $nombres = $_POST['nombres'];
    $direccion = $_POST['direccion'];
    $celular = $_POST['celular'];
    $DNI = $_POST['DNI'];
    $estatura = $_POST['estatura'];
    $peso = $_POST['peso'];

        if (!empty($nombres) && !empty($direccion) && !empty($celular) && !empty($DNI) && !empty($estatura) && !empty($peso) ) {
            # code...
            $sql_agregar = 'INSERT INTO personas(nombres,direccion,celular,dni,estatura,peso,estado) value (?,?,?,?,?,?,1)';
            $sentencia_agregar = $pdo->prepare($sql_agregar);
            $sentencia_agregar->execute(array($nombres,$direccion,$celular,$DNI,$estatura,$peso));

            $sentencia_agergar=null;
            $pdo=null;

            header('location:index.php');
          
        }else{

            $mensaje =  '<div class="alert alert-danger" role="alert"> Error debe completar los campos vacios </div>';
            
        }

    }

     //EDITAR
    if ($_GET) {
        $id = $_GET['id'];
        
        $sql_persona = 'SELECT * FROM personas where id=?';
        $sentencia_persona = $pdo->prepare($sql_persona);
        $sentencia_persona->execute(array($id));
        $resultado_persona = $sentencia_persona->fetch();

        $sentencia_persona=null;
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
    
    <section id="contenido">
        <div class="container pt-5">
          <h1 class="pb-5">    <a href="/aprende-crud-2">REGISTRO DE PERSONAS</a>  </h1>   
            <div class="row">
                <div class="col-md-8 pb-5">
                <?php if(!$_GET): ?>
                    <form method="POST">
                    <?php if(!empty($mensaje) ) {echo $mensaje; } ?>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombres" name="nombres"  placeholder="Ingresar nombres y apellidos">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="direccion" name="direccion"  placeholder="Ingresar direccion">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="celular" name="celular"  placeholder="Ingresar celular">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="DNI" name="DNI"  placeholder="Ingresar DNI">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="estatura" name="estatura"  placeholder="Ingresar estatura">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="peso" name="peso"  placeholder="Ingresar peso">                      
                        </div>
                    
                        <button type="submit" class="btn btn-success">AGREGAR PERSONA</button>
                    </form>
                <?php endif ?>

                <?php if($_GET): ?>
                    <form method="GET" action="editar.php">
                    
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombres" name="nombres"  value="<?php echo $resultado_persona['nombres'] ?>" placeholder="Ingresar nombres y apellidos">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $resultado_persona['direccion'] ?>" placeholder="Ingresar direccion">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $resultado_persona['celular'] ?>" placeholder="Ingresar celular">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="DNI" name="DNI"  placeholder="Ingresar DNI" value="<?php echo $resultado_persona['dni'] ?>">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="estatura" name="estatura" placeholder="Ingresar estatura" value="<?php echo $resultado_persona['estatura'] ?>">                      
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="peso" name="peso"  placeholder="Ingresar peso" value="<?php echo $resultado_persona['peso'] ?>">  
                            <input type="hidden" value="<?php echo $resultado_persona['id'] ?>" name="id">                    
                        </div>
                    
                        <button type="submit" class="btn btn-primary">EDITAR PERSONA</button>
                    </form>
                <?php endif ?>
                </div>
            </div>


            <div class="row">
                
                <div class="cold-md-12 pb-5">
                  
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Celular</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Estatura</th>
                            <th scope="col">Peso</th>
                            <th scope="col"> Operaciones </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($resultado as $dato): ?>
                            <tr>
                            <th scope="row"> <?php echo $dato['id'] ?> </th>
                            <td> <?php echo $dato['nombres'] ?> </td>
                            <td> <?php echo $dato['direccion'] ?> </td>
                            <td> <?php echo $dato['celular'] ?> </td>
                            <td> <?php echo $dato['dni'] ?> </td>
                            <td> <?php echo $dato['estatura'] ?> </td>
                            <td> <?php echo $dato['peso'] ?> </td>
                            <td>   <a href="eliminar.php?id=<?php echo $dato['id'] ?>"><i class="far fa-trash-alt float-right ml-2 "></i> </a>
                                   <a href="index.php?id=<?php echo $dato['id'] ?>"><i class="fas fa-edit float-right  "> </i> </a> 
                            </td>
                            </tr>
                           
                        </tbody>
                        <?php endforeach ?>
                    </table>
                    
                </div>
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