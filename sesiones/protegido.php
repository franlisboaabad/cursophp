<?php

session_start();

if (isset($_SESSION['admin'])) {
    # code...
    echo "bienvenido ".$_SESSION['admin'];

    echo '<br>';
    echo '<a href="cerrar.php">cerrar session </a>';
}else{
    echo "ERROR AL INGRESAR AL CONTENIDO PROTEGIDO";
}


