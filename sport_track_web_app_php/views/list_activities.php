<?php 
include __ROOT__."/views/header.php";
require_once(__ROOT__.'/model/UtilisateurDAO.php');
require_once(__ROOT__.'/model/ActiviteDAO.php');
require_once(__ROOT__.'/model/DataDAO.php');
require_once(__ROOT__.'/model/CalculDistanceImpl.php');

session_start();
$actDao = ActiviteDAO::getInstance();
$usrDao = UtilisateurDAO::getInstance();
$dataDao = DataDao::getInstance();
$user = $usrDao->find($_SESSION['mail'],$_SESSION['pswd'])[0];
$act = $actDao ->find($user);
$calc = new CalculDistanceImpl();
?>

<main class="d-flex flex-column justify-content-center align-items-center vh-100">
  <section class="my-3 p-4 bg-white rounded-4 shadow h-50 w-50 overflow-auto">
    <h2>Suivi d'Activités</h2>
    <hr>
    <table class="table table-condensed table-striped">
      <thead>
        <tr>
          <th scope ="col">#</th>
          <th scope ="col">Id activite</th>
          <th scope ="col">Date</th>
          <th scope ="col">Description</th>
        </tr>
      </thead>
      <tbody>	  		

      <?php
      foreach ($act as $acti){
        $data = $dataDao ->find($acti);
        $parcour = array();
        $target = $acti->getID();
         ?>
        <tr data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $target;?>" aria-expanded="false">
            <td></td>
            <td><?php echo $acti->getID(); ?></td>
            <td><?php echo $acti->getDate(); ?></td>
            <td><?php echo $acti->getDesc(); ?></td>
        </tr>
        <tr class="collapse" id="collapse<?php echo $target;?>">
          <td colspan="12">
            <table class="table table-striped">
              <thead>
                <tr>
									<th>Id donnee</th>
									<th>Heure</th>
									<th>Frequence cardiaque</th>		
									<th>Longitude</th>	
									<th>Latitude</th>	
									<th>Altitude</th>	
								</tr>
							</thead>				  		
							<tbody>
                  <?php
                    foreach ($data as $dat){
                      ?>
                      <tr>
										    <td><?php echo $dat->getId(); ?></td>
										    <td><?php echo $dat->getH(); ?></td>
										    <td><?php echo $dat->getFreq(); ?></td>
										    <td><?php echo $dat->getLong(); ?></td>
										    <td><?php echo $dat->getLat(); ?></td>
                        <td><?php echo $dat->getAlt(); ?></td>
									    </tr>
                      <?php
                      array_push($parcour, array("longitude" =>$dat->getLong(),"latitude" => $dat->getLat()));
                    }?>
              </tbody>
            </table>
            <?php echo '<span STYLE="padding:0 0 0 20px;">',"Distance parcourue: ",$calc->calculDistanceTrajet($parcour),"m <br>";
                  }?>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
  <form class="text-center d-flex justify-content-around w-50" action="/menu" method="post">
    <input class="btn btn-danger w-100 m-2 shadow" type="submit" value="Retour"><br>
  </form>
</main>

<?php include __ROOT__."/views/footer.html"; ?>