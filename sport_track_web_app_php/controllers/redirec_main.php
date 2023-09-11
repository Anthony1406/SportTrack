<?php
require(__ROOT__.'/controllers/Controller.php');

class RedirecMainController extends Controller{
    public function post($request){
        session_start();
        $this->render('main',[]);
    }
}

?>
