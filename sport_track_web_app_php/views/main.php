<?php include __ROOT__."/views/header.html"; ?>
<h2 class="text-center"> Main page</h2>
<a href="/connect">Sign in.</a>
<br>
<a href="/user_add">Sign up</a>
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
