<?php
require_once('security.inc');
require_once('../connect.php');

if(isset($_POST['submit']) && !empty($_POST['search'])){
    $mCle = trim(addslashes(htmlentities($_POST['search'])));
    $sql = " SELECT * FROM articles a
    INNER JOIN categories c
    ON a.id_categorie = c.id
    WHERE titre LIKE '$mCle%' OR nom LIKE '$mCle%'
    ORDER BY id_art";
}else{

    $sql = "SELECT *
    FROM articles a
    INNER JOIN categories c
    ON a.id_categorie = c.id
    ORDER BY id_art";
}

$result= mysqli_query($conn, $sql);

?>

<?php require_once('./partialsAdmin/headerAdmin.inc'); ?>


<div class="container">
<h1 class="text-center mt-4"> Gestion des articles du blog </h1>
</div>
<?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 1){ ?>
<p class="ml-5"><a href="ajouter.php" class="btn btn-warning"><i class="fas fa-plus"> Ajouter </i></a></p>
<?php } ?>
<form action="<?=$_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="input-group justify-content-end">
    <input type="search" class="form-control col-4 offset-8" name="search" id="search">
    <button type="submit" name="submit"><i class="fas fa-search"></i></button>
    </div>
</form>
<table class="table table-striped mt-2">
    <thead>
        <tr class="text-center">
            <th>id</th>
            <th>titre</th>
            <th>auteur</th>
            <th>image</th>
            <th>contenu</th>
            <th>date de creation</th>
            <th>categorie</th>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 1){ ?>
            <th colspan="2">Actions</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        
        <?php while($rows = mysqli_fetch_assoc($result)){ ?>
        <tr class="text-center">
            <td><?= $rows['id_art']; ?></td>
            <td><div id="titleAdm"><?= $rows['titre']; ?></div></td>
            <td><div id="autorAdm"><?= $rows['auteur']; ?></div></td>
            <td><div id="imageAdm"><img src="../assets/images/<?=$rows['image']; ?>"width="150"/></div></td>
            <td><div  id="content"><?= $rows['contenu']; ?></div></td>
            <td><?= $rows['date_created']; ?></td>
            <td><?= $rows['nom']; ?></td>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] == 1){ ?>
            <td><a href="editer.php?id=<?=$rows['id_art']; ?>" class=""><i class="far fa-edit text-primary"></i></a></td>
            <td><a href="supprimer.php?id=<?=$rows['id_art'];?>" class="" onclick="return confirm('Etes vous sûr de vouloir supprimer?')"><i class="far fa-trash-alt text-danger"></i></a></td>
            <?php } ?>
        </tr>
        <?php } ?>
           
    </tbody>
</table>

<?php require_once('./partialsAdmin/footerAdmin.inc'); ?>