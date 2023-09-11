<?php
 class SqliteConnection{
	 private $pdo;
	 private static $instance;
	 
	 private function  __construct() { 

		 $this->pdo = new PDO('sqlite:'.DB_FILE);
		 $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 }
	 public function getConnexion(){
			return $this->pdo;
        }
     /*
     * Returns DB instance or create initial connection
     * @return $objInstance;
     */
     public static function getInstance(  ) {
           
        if(!self::$instance){
            self::$instance = new SqliteConnection();
        }
       
        return self::$instance;
		}
	}
?>
