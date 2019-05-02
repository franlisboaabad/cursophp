<?php 
include_once '../aprende-crud/conexion.php';    

//echo password_hash("franklisboa", PASSWORD_DEFAULT)."\n";

$nombre_usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

    $sql_usser = 'SELECT * FROM usuario where nombre=? and estado=1';
    $sentencia_usser = $pdo->prepare($sql_usser);
    $sentencia_usser->execute(array($nombre_usuario));
    $resultado = $sentencia_usser->fetch();

    var_dump($resultado);

    if($resultado){
        echo'existe este usuario';
        die();
    }else{
        
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        if (password_verify($contrasena2, $contrasena)) {
            echo '¡La contraseña es válida! <br>';
            
             //AGREGAR
           if ($_POST) {
            
                $sql_agregar = 'INSERT INTO usuario(nombre,contrasena,estado) values (?,?,1)';
                $sentencia_agergar = $pdo->prepare($sql_agregar);
               
                
                if ( $sentencia_agergar->execute(array($nombre_usuario,$contrasena))) {
                    echo 'Agregado';
                }else{
                    echo 'Error';
                }
        
                $sentencia_agergar=null;
                $pdo=null;
                
                header('location:login.html');
            }
           
        } else {
            echo 'La contraseña no es válida.';
        }
    }

 


/*
echo '<pre>';
var_dump($nombre_usuario);
var_dump($contrasena);
var_dump($contrasena2);
echo '</pre>';
*/
