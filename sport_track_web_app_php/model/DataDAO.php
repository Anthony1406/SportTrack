<?php
require_once('SqliteConnection.php');
require_once('Data.php');
class DataDAO {
    private static DataDAO $dao;

    private function __construct() {}

    public final function find(Activite $act): Array{
        if($act instanceof Activite){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            $query = "select * from Data WHERE idActivity = ".$act->getID();
            $stmt = $dbc->query($query);
            $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
        }
        return $results;
    }

    public static function getInstance(): DataDAO {
        if(!isset(self::$dao)) {
            self::$dao= new DataDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnexion();
        $query = "select * from Data";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
        return $results;
    }

    public final function insert(Data $st,Activite $twoCle): void{
        try {
        if($st instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            // prepare the SQL statement
            $query = "INSERT INTO Data(freqCardiaque, heure, longitude, latitude, altitude, idActivity) VALUES (:f,:h,:lo,:la,:al, :ida );";
            $stmt = $dbc->prepare($query);
            // bind the paramaters
            $stmt->bindValue(':f',$st->getFreq(),PDO::PARAM_STR);
            $stmt->bindValue(':h',$st->getH(),PDO::PARAM_STR);
            $stmt->bindValue(':lo',$st->getLong(),PDO::PARAM_STR);
            $stmt->bindValue(':la',$st->getLat(),PDO::PARAM_STR);
            $stmt->bindValue(':al',$st->getAlt(),PDO::PARAM_STR);
           
            $stmt->bindValue(':ida',$twoCle->getId(),PDO::PARAM_STR);
           
            // execute the prepared statement
            $stmt->execute();
            $st->setIdAct($twoCle->getId());
            $st->setId(intval($dbc->lastInsertId()));
        }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function delete(Data $obj): void { 
        if($obj instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            // prepare the SQL statement
            $query = "DELETE FROM Data WHERE id = :id;";
            $stmt = $dbc->prepare($query);
            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_INT);
            print_r($query);
    
            // execute the prepared statement
            $stmt->execute();
        }
    
    }
    
        public function deleteAll(Data $obj): void { 
            if($obj instanceof Data){
                $dbc = SqliteConnection::getInstance()->getConnexion();
                // prepare the SQL statement
                $query = "DELETE FROM Data";
                $stmt = $dbc->prepare($query);
                // bind the paramaters
                
                print_r("Delete = ".$query);
                // execute the prepared statement
                $stmt->execute();
            }
        
        }

    public function update(Data $obj): void {
        if($obj instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            // prepare the SQL statement
            $query = "UPDATE Data SET freqCardiaque = :f, heure = :h, longitude = :lo, latitude =:la, altitude = :al WHERE id = :id;";
            $stmt = $dbc->prepare($query);
            // bind the paramaters
            $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_INT);
            $stmt->bindValue(':f',$obj->getFreq(),PDO::PARAM_STR);
            $stmt->bindValue(':h',$obj->getH(),PDO::PARAM_STR);
            $stmt->bindValue(':lo',$obj->getLong(),PDO::PARAM_STR);
            $stmt->bindValue(':la',$obj->getLat(),PDO::PARAM_STR);
            $stmt->bindValue(':al',$obj->getAlt(),PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>
