<?php include __ROOT__."/views/header.html"; ?>
<h1> Main page</h1>
<a href="/connect">Click here to display the connection form.</a>
<br>
<a href="/user_add">Click here to display the user add form.</a>
<br>
<?php 
if($_SESSION['mail'] != null && $_SESSION['pswd'] != null){
    ?>
    <a href="/upload">Ajouter une activité.</a>
    <br>
    <a href="/activities">Voir les activité ajouter.</a>
    <br>
    <a href="/disconnect">Deconnection.</a>
    <?php
}
    ?>        
<?php include __ROOT__."/views/footer.html"; ?>
