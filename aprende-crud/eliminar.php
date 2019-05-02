<?php 

include_once 'conexion.php';

$id = $_GET['id'];


$sql_editar = 'UPDATE colores set estado=0 where id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($id));


//cerramos conexion pdo
$sentencia_editar=null;
$pdo=null;


header('location:index.php');

