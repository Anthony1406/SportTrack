<?php include __ROOT__."/views/header.php"; ?>
<h1 class="text-center">Menu</h1>
<main class="d-flex flex-column justify-content-center align-items-center vh-100">
        <section class="my-3 p-4 bg-white rounded-4 shadow h-50 w-50">
        </section>
    <?php 
    session_start();
    if(isset($_SESSION['mail']) && isset($_SESSION['mail']) && $_SESSION['mail'] != null && $_SESSION['pswd'] != null){
    ?>
        <div class="text-center d-flex justify-content-around w-50">
            <a href="/disconnect" class="btn btn-danger w-100 m-2 shadow">Se déconnecter</a>
            <a href="/activities" class="btn btn-primary w-100 m-2 shadow">Suivi d'activité</a>
            <a href="/upload" class="btn btn-primary w-100 m-2 shadow">Ajout d'activité</a>
        </div>
    <?php
    }else{ ?>
        <h4 class="position-absolute top-0 end-0">
            <a href="/connect" class="btn btn-primary w-50">Sign in.</a>
            <a href="/user_add" class="btn btn-primary w-50">Sign up</a>
        </h4><?php
    }
    ?>
</main>        
<?php include __ROOT__."/views/footer.html"; ?>
