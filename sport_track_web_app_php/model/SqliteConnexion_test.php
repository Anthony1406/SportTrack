<?php
	require_once("UtilisateurDAO.php");
	require_once("ActiviteDAO.php");
	require_once("DataDAO.php");
	$objactivite = new Activite(); 
	$objUser = new Utilisateur();
	$objData = new Data(); 
	
	$objactivite->init("2022-07-21","Petit balade dans les montagnes"); 
	$objUser->init("eiev,ops@gmail.com", "MonsieurPropre", "Hascoet", "Carle", "Homme", 60, 159, "2002-02-21");
	$objData->init(40,"20:30:20",23.6,38.2,32); //$freq, $h, $long, $lat, $alt
	$pdo = DataDAO::getInstance()->deleteAll($objData);
	$pdo = ActiviteDAO::getInstance()->deleteAll($objactivite);
	$pdo = UtilisateurDAO::getInstance()->deleteAll($objUser);
	
	

	print_r("Test utilisateur : /n****TEST 1 insert : ");
	
	
	$pdo = UtilisateurDAO::getInstance()->insert($objUser);
	$pdo = UtilisateurDAO::getInstance()->findAll();
	print_r($pdo);

	print_r("****TEST 2 update : ");
	$objUser->setMail("ENFIN@gmail.com");
	$pdo = UtilisateurDAO::getInstance()->update($objUser);
	$pdo = UtilisateurDAO::getInstance()->findAll();
	print_r($pdo);

	print_r("****TEST 3 delete : ");
	$pdo = UtilisateurDAO::getInstance()->delete($objUser);
	//var_dump($objUser);
	$pdo = UtilisateurDAO::getInstance()->findAll();
	print_r($pdo);
	
	print_r("Test Activité : /n****TEST 1 insert : ");
	$pdo = UtilisateurDAO::getInstance()->insert($objUser);

	$pdo = ActiviteDAO::getInstance()->insert($objactivite,$objUser);
	$pdo = ActiviteDAO::getInstance()->findAll();
	print_r($pdo);

	print_r("****TEST 2 update : ");
	$objactivite->setDesc("Randonné");
	$pdo = ActiviteDAO::getInstance()->update($objactivite);
	$pdo = ActiviteDAO::getInstance()->findAll();
	print_r($pdo);

	print_r("****TEST 3 delete : ");
	$pdo = ActiviteDAO::getInstance()->delete($objactivite);
	//var_dump($objUser);
	$pdo = ActiviteDAO::getInstance()->findAll();
	print_r($pdo);

	print_r("Test data : /n****TEST 1 insert : ");
	$pdo = ActiviteDAO::getInstance()->insert($objactivite,$objUser);
	$pdo = ActiviteDAO::getInstance()->findAll();
	print_r($pdo);
	var_dump($objactivite);
	$pdo = DataDAO::getInstance()->insert($objData,$objactivite);
	$pdo = DataDAO::getInstance()->findAll();
	print_r($pdo);
	var_dump($objData);

	print_r("****TEST 2 update : ");
	$objData->setFreq(50);
	$pdo = DataDAO::getInstance()->update($objData);
	$pdo = DataDAO::getInstance()->findAll();
	print_r($pdo);
	 
		print_r("****TEST 3 delete : ");
		$pdo = DataDAO::getInstance()->delete($objData);
		//var_dump($objUser);
		$pdo = DataDAO::getInstance()->findAll();
		print_r($pdo);
		//$pdo->beginTransaction();
		//$pdo->commit(); 
		//print_r($pdo);
		$pdo = DataDAO::getInstance()->deleteAll($objData);
		$pdo = ActiviteDAO::getInstance()->deleteAll($objactivite);
		$pdo = UtilisateurDAO::getInstance()->deleteAll($objUser);
	
?>
