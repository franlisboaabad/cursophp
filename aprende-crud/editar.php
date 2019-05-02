<?php   

include_once 'conexion.php';

$id = $_GET['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];

$sql_editar = 'UPDATE colores set color=?,descripcion=? where id=?';
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($color,$descripcion,$id));

//cerrar conexion pdo

$sentencia_editar=null;
$pdo=null;

header('location:index.php');


