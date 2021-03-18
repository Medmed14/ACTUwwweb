<?php
require_once('security.inc');
require_once('../connect.php');

$error = "";
$sql = "SELECT id, nom FROM categories";
$res = mysqli_query($conn, $sql);

if(isset($_POST['soumis'])){
    if(isset($_POST['titre']) && strlen($_POST['titre'])<=60){
        $titre = trim(htmlspecialchars(addslashes($_POST['titre'])));
        $auteur = trim(htmlspecialchars(addslashes($_POST['auteur'])));
        $contenu = trim(htmlspecialchars(addslashes($_POST['cont'])));
        $id_categorie = trim(htmlspecialchars(addslashes($_POST['categorie'])));
        $image = $_FILES['image']['name'];

        $destination ="../assets/images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);

        $sql2= "INSERT INTO articles(titre, auteur,id_categorie, image, contenu)
                VALUES('$titre','$auteur','$id_categorie','$image','$contenu')";
        $result = mysqli_query($conn, $sql2);
        if(mysqli_insert_id($conn) > 0){
            header('location:liste.php');
        }else{
            $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';
        }
        
    }
}

require_once('./partialsAdmin/headerAdmin.inc'); 
?>
<div class="offset-2 col-8">
<h1 class="bg-dark text-center text-white">Administration</h1>
<h2>Formulaire d'ajout</h2>
    <?= $error; ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre"  placeholder="Entrez le titre svp" required>
        </div>
        <div class="col-6">
            <label for="auteur">Auteur</label>
            <input type="text" class="form-control" id="auteur" name="auteur"  placeholder="Entrez le nom de l'auteur svp" required>
        </div>
        <div class="col-12">
            <label for="image">Image d'illustration</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="col">
            <label for="cont">Contenu de l'article</label>
            <textarea class="form-control" id="cont" name="cont"  placeholder="Ici le contenu de votre article..." rows="9" required></textarea>
        </div>
    </div>
    <div class="col">
        <label for="categorie">categorie</label>
        <select class="form-select" id="categorie" name="categorie" >
        <option >Choisir</option>
        <?php while($rows = mysqli_fetch_assoc($res)){?>
            <option value="<?=$rows['id']; ?>"><?=$rows['nom']; ?></option>
        <?php } ?>
        </select>
    </div>
    </div>
    </div>
    <button type="submit" class="btn btn-warning col-6 offset-3 mt-5 mb-5" name="soumis" >Modifier</button>
    </form>
</div>
<?php require_once('./partialsAdmin/footerAdmin.inc'); ?>