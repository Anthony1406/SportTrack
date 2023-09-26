<?php include __ROOT__."/views/header.php"; ?>

<main class="d-flex flex-column justify-content-center align-items-center vh-100">
  <section class="my-3 p-4 bg-white rounded-4 shadow h-50 w-50 mx-auto">
    <h2>Connexion</h2>
    <hr>
    <form action="/connect" method="post" class="align-items-center">
      <label>Adresse mail</label><br>
      <input type="text" name="mail" class="form-control" placeholder="nom.e0000000@etud.univ-ubs.fr"><br>
      <label>Mot de passe</label><br>
      <input type="password" name="pswd" class="form-control" required><br>
      <input type="submit" value="Valider" class="btn btn-primary w-50"><br>
    </form>
  </section>
</main>

          
<?php include __ROOT__."/views/footer.html"; ?>
