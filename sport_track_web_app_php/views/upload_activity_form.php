<?php include __ROOT__."/views/header.html"; ?>

<form action="/upload" method="POST" enctype="multipart/form-data">
    <label for="fileJson">Choisir un fichier (json)</label><br>
    <input type="file"  name="fichierJson" accept=".json" required><br>
    <input type="submit" value="Valider"><br>
</form>
<form action="/redirec_main" method="post">
<input type="submit" value="Redirection vers la page d'accueil"><br>
</form>
<?php include __ROOT__."/views/footer.html"; ?>