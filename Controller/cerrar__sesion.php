<?php
 require_once '../Model/User.php';
 session_start(); // Comienzo de la session

 $_SESSION['logueado'] = false;
include_once('../View/sesionCerrada.php');


 
?>