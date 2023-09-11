<?php 
include __ROOT__."/views/header.html";
require_once(__ROOT__.'/model/UtilisateurDAO.php');
require_once(__ROOT__.'/model/ActiviteDAO.php');
require_once(__ROOT__.'/model/DataDAO.php');
require_once(__ROOT__.'/model/CalculDistanceImpl.php');
?>

<h2>Vue Activiter</h2>

<?php
    session_start();
    $actDao = ActiviteDAO::getInstance();
    $usrDao = UtilisateurDAO::getInstance();
    $dataDao = DataDao::getInstance();
    $user = $usrDao->find($_SESSION['mail'],$_SESSION['pswd'])[0];
    $act = $actDao ->find($user);
    //print($act);
    $calc = new CalculDistanceImpl();
    foreach ($act as $acti){
        $data = $dataDao ->find($acti);
        $parcour = array();
        echo $acti->getID(),":", $acti->getDate()," ", $acti->getDesc(),"<br>";
        foreach ($data as $dat){
            echo '<span STYLE="padding:0 0 0 20px;">',$dat->getId(),"/",$dat->getH(),"|",$dat->getFreq(),"|",$dat->getLat(),"|",$dat->getLong(),"|",$dat->getAlt(),"<br>";
            array_push($parcour, array("longitude" =>$dat->getLong(),"latitude" => $dat->getLat()));
        }
        echo '<span STYLE="padding:0 0 0 20px;">',"Distance parcourue: ",$calc->calculDistanceTrajet($parcour),"m <br>";
    }
?>

<form action="/redirec_main" method="post">
<input type="submit" value="Redirection vers la page d'accueil."><br>
</form>
<?php include __ROOT__."/views/footer.html"; ?>