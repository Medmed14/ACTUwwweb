<?php
session_start();
// si l'utilisateur n'existe pas on refuse l'acces
if(isset($_SESSION['auth'])){
    header('location:index.php');
}
?>