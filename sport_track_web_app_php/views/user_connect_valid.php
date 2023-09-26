<?php
include __ROOT__."/views/header.php";
?>
<main class="d-flex flex-column justify-content-center align-items-center vh-100">
  <section class="my-3 p-4 bg-white rounded-4 shadow h-50 w-50 mx-auto">
    <h2>Connexion effectué</h2>
    <hr>
    <form action="/menu" method="post">
        <input type="submit" value="Redirection vers la page d'accueil"><br>
    </form>
  </section>
</main>
<?php
include __ROOT__."/views/footer.html";
?>