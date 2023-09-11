<?php
require(__ROOT__.'/controllers/Controller.php');
require(MODEL_DIR.'/UtilisateurDAO.php');

class AddUserController extends Controller{
     
    public function get($request){
        $this->render('user_add',[]);
    }

    public function post($request){
        $user = new Utilisateur();
        
        $user->init($request['mail'],$request['pswd'],$request['firstname'],$request['lastname'],$request['sexe']
        ,$request['weight'],$request['height'],$request['birthdate']);

        $pdo = UtilisateurDAO::getInstance()->insert($user);
        $pdo = UtilisateurDAO::getInstance()->findAll();
        $this->render('user_add_valid',['firstname' => $request['firstname'], 'lastname' => $request['lastname'],
        'mail' => $request['mail'],'pswd' => $request['pswd'],'sexe' => $request['sexe'],'weight' => $request['weight'],'height' => $request['height'],
        'birthdate' => $request['birthdate']]);
    }
}

?>
