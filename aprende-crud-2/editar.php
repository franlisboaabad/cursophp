<?php   

include_once 'conexion.php';

$id = $_GET['id'];
$nombres = $_GET['nombres'];
$direccion = $_GET['direccion'];
$celular = $_GET['celular'];
$DNI = $_GET['DNI'];
$estatura = $_GET['estatura'];
$peso = $_GET['peso'];

if (!empty($nombres) && !empty($direccion) && !empty($celular) && !empty($DNI) && !empty($estatura) && !empty($peso) ) {

    $sql_editar = 'UPDATE personas set nombres=?,direccion=?,celular=?,dni=?,estatura=?,peso=? where id=?';
    $sentencia_editar = $pdo->prepare($sql_editar);
    $sentencia_editar->execute(array($nombres,$direccion,$celular,$DNI,$estatura,$peso,$id));
    //cerrar conexion pdo

    $sentencia_editar=null;
    $pdo=null;

    header('location:index.php');
}else{
    echo "error al insertar los datos";
}




