<?php include __ROOT__."/views/header.html"; ?>

<form action="/user_add" method="post">
<label for="fname">Nom :</label><br>
<input type="text" id="Nom" name="firstname" required autofocus><br>
<label for="fname">Prénom :</label><br>
<input type="text" id="Prenom" name="lastname" required><br>
  <label for="email">Email :</label><br>
  <input type="email" id="email" name="mail"  required><br>
  <label for="pwd">Password :</label><br>
  <input type="password" id="pwd" name="pswd"  required><br>
  <label>Sexe</label> :<br>
  <input type="text" name="sexe" required><br>
  <label for="Poids">Poids :</label><br>
  <input type="number" id="Poids" name="weight"  placeholder="Kg"  required><br>

  <label for="Taille">Taille :</label><br>
  <input type="number" id="taille" name="height"  placeholder="Cm" required><br>

  <label for="birthday">Date de naissance :</label><br>
  <input type="date" id="birthday" name="birthdate"  required><br>
  <br>
  <input type="submit" value="Valider"><br>

</form>
            
<?php include __ROOT__."/views/footer.html"; ?>