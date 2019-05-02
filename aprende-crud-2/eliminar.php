<?php 

include_once 'conexion.php';


$id = $_GET['id'];
$sql_eliminar = 'UPDATE personas set estado=0 where id=?';
$sql_eliminar = $pdo->prepare($sql_eliminar);
$sql_eliminar->execute(array($id));
//cerramos conexion pdo
$sentencia_editar=null;
$pdo=null;
header('location:index.php');