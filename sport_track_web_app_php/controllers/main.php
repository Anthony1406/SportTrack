<?php
require(__ROOT__.'/controllers/Controller.php');

class MainController extends Controller{

    public function get($request){
        $_SESSION['mail'] = null;
        $_SESSION['pswd'] = null;
        $this->render('main',[]);
    }

}

?>
