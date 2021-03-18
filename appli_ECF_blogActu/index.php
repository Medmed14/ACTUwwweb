<?php

require_once('connect.php');

$sql = "SELECT * FROM articles a
        INNER JOIN categories c
        ON a.id_categorie = c.id";

$result = mysqli_query($conn, $sql);

function trDate($date)
{
    $dateArray = (explode("-", substr(($date), 0, 10)));
    $dateIns = $dateArray[2] . "/" . $dateArray[1] . "/" . $dateArray[0];
    return $dateIns;
}
?>

<?php require_once('partials/header.inc'); ?>

<div id="articles" class="container">
    <div class="text-center mt-5">
        <h1>L'ACTU wWweb</h1>
        <p>Toute l'actualité du web orienté nouvelles technologies...</p>
    </div>


    
        <div class="row  mt-5">
        
            <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                <div class="col-8 offset-2">
                    <div class="card mb-5">
                        <img src="assets/images/<?= $rows['image']; ?>" class="card-img-top" alt="..." height="">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li id="auteur" class="list-group-item">article cree le <?= trDate($rows['date_created']); ?> par <?= $rows['auteur']; ?></li>
                                <li id="titre" class="list-group-item text-center"><?= $rows['titre']; ?></li>
                                <li id="contenu" class="list-group-item"><?= $rows['contenu']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
     
    
</div>
<?php require_once('partials/footer.inc'); ?>