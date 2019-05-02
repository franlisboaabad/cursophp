<?php 
session_start();
include_once '../aprende-crud/conexion.php';    

$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];

$sql_usser = 'SELECT * FROM usuario where nombre=?  and estado=1';
$sentencia_usser = $pdo->prepare($sql_usser);
$sentencia_usser->execute(array($nombre));
$resultado = $sentencia_usser->fetch();

echo '<pre>';
var_dump($resultado);
echo '</pre>';

if (!$resultado) {
    # code...
    echo 'no existe usuario';
    die();
}

if (password_verify($contrasena,$resultado['contrasena'])) {
    echo '¡La contraseña es válida! <br>';
    $_SESSION['admin'] = $nombre;
    header('location:index.php');
} else {
    echo 'La contraseña no es válida.';
    die();
}
