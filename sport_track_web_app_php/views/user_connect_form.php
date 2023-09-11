<?php include __ROOT__."/views/header.html"; ?>

<form action="/connect" method="post">
  <label>Mail :</label><br>
  <input type="text" name="mail" required><br>
  <label>Mot de passe</label> :<br>
  <input type="text" name="pswd" required><br>
  <input type="submit" value="Valider"><br>
</form>
            
<?php include __ROOT__."/views/footer.html"; ?>
