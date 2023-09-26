<?php include __ROOT__."/views/header.php"; ?>

<main class="d-flex flex-column justify-content-center align-items-center vh-100">
  <section class="my-3 p-4 bg-white rounded-4 shadow h-50 w-50">
    <form action="/menu" method="post">
        <h2>Votre compte à été créé avec succes !</h2>
        <br>
        <input class="position-absolute top-50 start-50 translate-middle"type="submit" value="Valider"><br>
    </form>
  </section>
</main>
<?php include __ROOT__."/views/footer.html"; ?>