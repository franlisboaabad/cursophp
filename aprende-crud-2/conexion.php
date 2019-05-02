<?php 
$enlace = 'mysql:host=localhost;dbname=prueba';
$usuario = 'root';
$pass  = '';

    try {
        $pdo = new PDO($enlace,$usuario,$pass);
    } catch (PDOException $e) {
       print "error! de conexion ".$e->getMessage()."<br/>";
       die();
    }
