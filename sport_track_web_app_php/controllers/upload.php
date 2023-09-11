<?php
require_once(__ROOT__.'/controllers/Controller.php');
require_once(__ROOT__.'/model/UtilisateurDAO.php');
require_once(__ROOT__.'/model/ActiviteDAO.php');
require_once(__ROOT__.'/model/DataDAO.php');
session_start();
class UploadActivityController extends Controller{
    public function get($request){
        $this->render('upload_activity_form',[]);
    }


    public function post($request){
            //print_r($_FILES);
        $data = file_get_contents($_FILES['fichierJson']['tmp_name']);
        $content = json_decode($data, true);
        $this->parseJson($content);
        

        $this->render('upload_activity_form',[]);
        echo 'ajouté';
    }

    private function parseJson($content){

        
        $dao = ActiviteDAO::getInstance();
        $usrDao = UtilisateurDAO::getInstance();
        $utilisateur = $usrDao->find($_SESSION['mail'],$_SESSION['pswd'])[0];
        $act = new Activite();
        $act->init($content['activity']['date'], $content['activity']['description']);

        $dao->insert($act, $utilisateur); 
        

        $maxId = $dao->findMaxId();
        
        $dataDAO = DataDAO::getInstance();

        foreach($content['data'] as $x) {
            $data = new Data();
            $data->init($x['time'], $x['cardio_frequency'], $x['latitude'],$x['longitude'], $x['altitude']);
            $dataDAO->insert($data, $maxId[0]);
        }


    }
}

?>