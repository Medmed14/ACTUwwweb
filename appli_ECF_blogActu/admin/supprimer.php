<?php
require_once('security.inc');
require_once('../connect.php');

if(isset($_GET['id']) && $_GET['id'] < 1000){  

    $id = (int)htmlspecialchars(addslashes($_GET['id']));

    $req = "SELECT image FROM articles
            WHERE id_art =".$id;
    $res = mysqli_query($conn, $req);
    $data = mysqli_fetch_assoc($res);

    $sql = "DELETE FROM articles
        WHERE id_art = ".$id;

    $result = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        copy('../assets/images'.$data['image'],'../assets/archives'.$data['image']); //copie l'image suppr pour pas la perdre
        unlink('../assets/images'.$data['image']); //suppr du fichier
        header('location:liste.php'); // redirect vers la liste
    }else{
        echo '<div class="alert alert-danger"> Erreur de suppression </div>';
    }


}
?>