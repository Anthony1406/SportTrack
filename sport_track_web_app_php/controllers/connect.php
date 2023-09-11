<?php
require(__ROOT__.'/controllers/Controller.php');
require(MODEL_DIR.'/UtilisateurDAO.php');

class ConnectController extends Controller{

    public function get($request){
        $this->render('user_connect_form',[]);
    }

    public function post($request){
        $pdo = UtilisateurDAO::getInstance()->find($request['mail'],$request['pswd']);
        $isEmply = empty($pdo);
        if ($isEmply == 1) {
            $this->render('user_error',[]);
        } else {
            session_start();
            $_SESSION['mail'] = $request['mail'];
            $_SESSION['pswd'] = $request['pswd'];
            $this->render('user_connect_valid',[]);
        }
        
    }
}

?>
