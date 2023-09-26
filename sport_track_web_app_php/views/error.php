<?php
// header
include __ROOT__."/views/header.php";
?>
<main class="d-flex flex-column justify-content-center align-items-center vh-100">
  <section class="my-3 p-4 bg-white rounded-4 shadow h-50 w-50 text-center">
  <?php
  if($data[0] == "connect"){
    echo '<h2>Vos identifiants sont incorrect .</h2>
        <a href ="/connect" class="btn btn-danger w-50">Retour</a>';
  }else if($data[0] == "user_add"){
    echo '<h2>Vos identifiants sont deja utilisé</h2>
        <a href ="/user_add" class="btn btn-danger w-50">Retour</a>';
  }else if($data[0] == "upload"){
    echo '<h2>Le fichier n est pas valide</h2>
        <a href ="/upload" class="btn btn-danger w-50">Retour</a>';
  }else if($data[0] == "upload_null"){
    echo '<h2>Aucun fichier a été envoyer</h2>
        <a href ="/upload" class="btn btn-danger w-50">Retour</a>';
  }
    ?>
  </section>
</main>
<?php
include __ROOT__."/views/footer.html";
?>
