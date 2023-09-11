<?php
require_once('SqliteConnection.php');
require_once('Activite.php');
class ActiviteDAO {
    private static ActiviteDAO $dao;

    private function __construct() {}

    public static function getInstance(): ActiviteDAO {
        if(!isset(self::$dao)) {
            self::$dao= new ActiviteDAO();
        }
        return self::$dao;
    }

    public final function find(Utilisateur $user): Array{
        if($user instanceof Utilisateur){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            $query = "select * from Activity where idUser = ".$user->getId();
            $stmt = $dbc->query($query);
            $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activite');
        }
        return $results;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnexion();
        $query = "select * from Activity";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activite');
        return $results;
    }

    public final function findMaxId(): Array{
     
        $dbc = SqliteConnection::getInstance()->getConnexion();
        $query = "select id from Activity WHERE id = (SELECT max(id) FROM Activity)";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activite');
    
        return $results;
    }

    public final function insert(Activite $st,Utilisateur $fk): void{
        if($st instanceof Activite){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            // prepare the SQL statement
            $query = "INSERT INTO Activity(date, description, idUser) VALUES (:da, :de, :idu);";
            $stmt = $dbc->prepare($query);
            // bind the paramaters
            $stmt->bindValue(':da',$st->getDate(),PDO::PARAM_STR);
            $stmt->bindValue(':de',$st->getDesc(),PDO::PARAM_STR);
           
            $stmt->bindValue(':idu',$fk->getId(),PDO::PARAM_STR);
            // execute the prepared statement
            $stmt->execute();
            $st->setIdUser($fk->getId()); 
            $st->setId(intval($dbc->lastInsertId()));
        }
    }

   public function delete(Activite  $obj): void { 
    if($obj instanceof Activite ){
        $dbc = SqliteConnection::getInstance()->getConnexion();
        // prepare the SQL statement
        $query = "DELETE FROM Activity WHERE id = :id;";
        $stmt = $dbc->prepare($query);
        // bind the paramaters
        $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_INT);
       

        // execute the prepared statement
        $stmt->execute();
    }

    }




    public function deleteAll(Activite  $obj): void { 
        if($obj instanceof Activite ){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            // prepare the SQL statement
            $query = "DELETE FROM Activity";
            $stmt = $dbc->prepare($query);
            // bind the paramaters
            
           
            // execute the prepared statement
            $stmt->execute();
        }
    
        }


 

  public function update(Activite $obj): void {
    if($obj instanceof Activite ){
        $dbc = SqliteConnection::getInstance()->getConnexion();
        // prepare the SQL statement
        $query = "UPDATE Activity SET date = :da, description = :de WHERE id = :id;";
        $stmt = $dbc->prepare($query);
        // bind the paramaters
        $stmt->bindValue(':da',$obj->getDate(),PDO::PARAM_STR);
        $stmt->bindValue(':de',$obj->getDesc(),PDO::PARAM_STR);
        $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_STR);
     
        
        
        // execute the prepared statement
        $stmt->execute();
    }

  }
}
?>
