<?php
session_start();
require(__ROOT__.'/controllers/Controller.php');

class DisconnectUserController extends Controller{

    public function get($request){
        $_SESSION['mail'] = null;
        $_SESSION['pswd'] = null;
        $this->render('user_disconnect',[]);
    }

    public function post($request){
        $this->render('main',[]);
    }
}
?>