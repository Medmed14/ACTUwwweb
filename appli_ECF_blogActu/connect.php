<?php

$conn = mysqli_connect('127.0.0.1','root','','bdd_infos');

if(!$conn){
    echo 'erreur de connexion'.mysqli_connect_error($conn)." ".mysqli_connect_errno($conn);
}

?>