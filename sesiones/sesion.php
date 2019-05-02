<?php 

session_start();
$login = "Frank Lisboa Abad";
$_SESSION['admin'] = $login;


if (isset($_SESSION['admin'])) {
    # code...
    echo "sesion iniciada";
    header('location:index.php');
}