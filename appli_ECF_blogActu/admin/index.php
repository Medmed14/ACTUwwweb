<?php
require_once('../connect.php');
$error = '';

if(isset($_POST['submit'])){
    if(!empty($_POST['login']) && !empty($_POST['pass'])){
    $login = trim(htmlentities(addslashes($_POST['login'])));
    $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));

    $sql = "SELECT * 
            FROM utilisateurs
            WHERE login = '$login' AND pass = '$pass'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user'] = $data;
        header('location:liste.php');
    }else{
        $error = '<div class="alert alert-danger"> L\'identifiant et/ou le mot de passe ne correspondent pas... </div>';
    }

}else{
    $error = '<div class="alert alert-danger"> L\'identifiant et le mot de passe sont requis... </div>';
}
}
?>

<?php
require_once('./partialsAdmin/headerAdmin.inc');
?>

<div id="formConn" class="container">
    <div class="card col-6 offset-3 mt-5 p-2 text-center bg-light">
        <?= $error?>
        <div class="card-header bg-dark text-white">
        Formulaire de connexion
        </div>
        
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
          <label class="mt-2" for="login">Identifiant *</label>
          <input type="text" class=" mt-2 mb-2 form-control" id="login" name="login" placeholder="Entrer login">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mot de passe *</label>
          <input type="pass" class="mb-2 mt-2 form-control" id="pass" name="pass" placeholder="Entrer le mot de passe">
        </div>
        <button type="submit" class="btn btn-primary mt-2 col-6" name="submit">Submit</button>
      </form>   
    </div>   
</div>

<?php
require_once('./partialsAdmin/footerAdmin.inc');
?>