<?php include __ROOT__."/views/header.php"; ?>

<main class="d-flex flex-column justify-content-center align-items-center vh-100">
  <section class="my-3 p-4 bg-white rounded-4 shadow h-50 w-50 mx-auto">
    <h2>Télécharger un fichier</h2>
    <hr>
    <div class="d-flex w-100 justify-content-center">
      <form action="/upload" method="post" enctype="multipart/form-data" class="w-50 mt-5">
        <label for="file" class="form-label">Fichier (JSON)</label>
        <input class="form-control w-100" id="file" type="file" name="fichierJson" accept=".json">
        <button type="submit" class="btn btn-primary w-100 mt-5">Envoyer</button>
      </form>
    </div>
  </section>
  <div class="text-center d-flex justify-content-around w-50">
    <div class="w-100 m-3"></div>
      <form action="/menu" method="post">
        <input type="submit" value="Retour." class="btn btn-danger w-100 m-2 shadow"><br>
      </form>
    <div class="w-100 m-3"></div>
  </div>
</main>
<?php include __ROOT__."/views/footer.html"; ?>