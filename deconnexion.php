<?php
session_start();
if(!isset($_SESSION['user'])){
    //si user n'est pas connecter
    //redirection vers page de connexion
    header("location:index.php");
}
//destruction de tous les sessions
session_destroy();
//redirection vers la page de connexion
header("location:index.php");
?>