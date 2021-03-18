<?php
require_once('security.inc');
require_once('../connect.php');

$error = "";

$sql= "SELECT id, nom FROM categories";
$res = mysqli_query($conn, $sql);

if(isset($_GET['id']) && $_GET['id'] <= 1000){
    $id = htmlspecialchars(addslashes($_GET['id']));
    $sql = "SELECT * FROM articles a
            INNER JOIN categories c
            ON a.id_categorie = c.id
            WHERE a.id_art = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        //  var_dump($data);
    }
}


if(isset($_POST['soumis'])){
        $id_art = trim(htmlspecialchars(addslashes($_POST['id_art'])));
        $titre = trim(htmlspecialchars(addslashes($_POST['titre'])));
        $auteur = trim(htmlspecialchars(addslashes($_POST['auteur'])));
        $contenu = trim(htmlspecialchars(addslashes($_POST['contenu'])));
        $id_categorie = trim(htmlspecialchars(addslashes($_POST['categorie'])));
        $image = $_FILES['image']['name'];
        
        $destination ="../assets/images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);
    
    if(empty($image)){

        $sql = "UPDATE articles SET titre = '$titre', auteur = '$auteur', contenu = '$contenu', id_categorie = '$id_categorie'
        WHERE id_art = '$id_art'";

    }else{
        if(file_exists('../assets/images/'.$data['image'])){

            unlink('../assets/images/'.$data['image']);
        
        $sql = "UPDATE articles SET titre = '$titre', auteur = '$auteur', contenu = '$contenu', id_categorie = '$id_categorie', image='$image'
        WHERE id_art = '$id_art'";
        }
    }

        
        $resultat = mysqli_query($conn, $sql);

        if(mysqli_affected_rows($conn) > 0){
            header('location:liste.php');
            
        }else{
            $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';
           
        }

}

require_once('./partialsAdmin/headerAdmin.inc'); 
?>

<div class="offset-2 col-8">
<h1 class="bg-dark text-center text-white">Administration</h1>
<h2>Formulaire d'édition</h2>
    <?= $error; ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_art" value="<?=$data['id_art'];?>">
    <div class="row">
        <div class="col-6">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="<?=$data['titre'];?>" placeholder="Entrez le titre svp" required>
        </div>
        <div class="col-6">
            <label for="auteur">Auteur</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="<?=$data['auteur'];?>" placeholder="Entrez le nom de l'auteur svp" required>
        </div>
        <div class="col-12">
            <label for="image">Image d'illustration</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="../assets/images/<?=$data['image'];?>" width="50" alt="">
        </div>
        <div class="col">
            <label for="contenu">Contenu de l'article</label>
            <textarea type="text" class="form-control" id="contenu" name="contenu" value="<?=$data['contenu'];?>" placeholder="Ici le contenu de votre article..." rows="9" required></textarea>
        </div>
    </div>
    <div class="col">
        <label for="categorie">categorie</label>
        <select class="form-select" id="categorie" name="categorie" >
        <option value="<?=$data['id_categorie'];?>" ><?=$data['nom'];?></option>
        <?php while($rows = mysqli_fetch_assoc($res)){ if($data['id_categorie'] !== $rows['id']){?>
            <option value="<?=$rows['id']; ?>"><?=ucfirst($rows['nom']); ?></option>
        <?php }} ?>
        </select>
    </div>
    </div>
    </div>
    <button type="submit" class="btn btn-warning col-6 offset-3 mt-5 mb-5" name="soumis" >Modifier</button>
    </form>
</div>
<?php require_once('./partialsAdmin/footerAdmin.inc'); ?>

