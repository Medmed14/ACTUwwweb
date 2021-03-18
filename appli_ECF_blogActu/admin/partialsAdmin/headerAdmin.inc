<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>L'Actu wWweb</title>
  <link rel="stylesheet" href="./CSSAdmin/styleAdmin.css" type="text/css" />
  <link rel="shortcut icon" type="image/ico" href=".././assets/images/3126logo.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="../JS_Admin/scriptSearch.js"></script>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"><img src=".././assets/images/logo.png" width="70"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a id="retourSite" href="../index.php" target="_blank">Aperçu sur le Site</a>
        <p id="intitule">Administration</p>

        <div class="nav-item dropdown">
          <?php
          if (isset($_SESSION['user'])) { ?>
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['user']['login']; ?>
            </a>
          <?php } ?>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] = 1) { ?>
              <li><a class="dropdown-item" href="../inscription.php">Inscription</a></li>
            <?php } ?>
            <!-- <li><a class="dropdown-item" href="index.php">Connexion</a></li> -->
            <li><a class="dropdown-item" href="../logout.php">Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>