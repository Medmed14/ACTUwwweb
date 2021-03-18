<?php require_once('partials/header.inc');?>
<div id="contact" class="container">
<h1 class="text-center mt-5">Contacter l'équipe de l'ACTU wWweb</h1>

<div class="row col-12">

<form class="col-12 mt-5 col-md-6 offset-md-1">
<div class="row mb-2">
<div class="mb-3 col-6">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom">
    
  </div>
  <div class="mb-3 col-6">
    <label for="prenom" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom">
    
  </div>
  </div>
  <div class="row mb-2">
<div class="mb-3 col-6">
    <label for="telephone" class="form-label">Telephone</label>
    <input type="phone" class="form-control" id="telephone" name="telephone">
    
  </div>
  <div class="mb-3 col-6">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@mail.com">
    
  </div>
  </div>
  <div>
  <label for="message" class="form-label">Message</label>
  <textarea class="form-control" id="message" name="message" rows="8" placeholder="Votre message ici..."></textarea>
  </div>
  <button id="btnCont" type="submit" class="offset-3 col-6 btn btn-primary mt-4" >Envoyer</button>
</form>

<div id="cont" class="col-12 col-md-5">
    <p class="text-center"><i class="fas fa-map-marked-alt"></i></p>
    <p class="text-center">28 rue des Rosiers 75003 PARIS</p>
    <p class="text-center"><i class="fas fa-phone-square-alt"></i></p>
    <p class="text-center">( +33 ) 521478965</p>
    <p class="text-center"><i class="fas fa-at"></i></p>
    <p class="text-center">actuweb@contact.com</p>

</div>

</div>
</div>
<?php require_once('partials/footer.inc');?>