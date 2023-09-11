<?php
require_once('SqliteConnection.php');
require_once('Utilisateur.php');
class UtilisateurDAO {
    private static UtilisateurDAO $dao;

    private function __construct() {}

    public static function getInstance(): UtilisateurDAO {
        if(!isset(self::$dao)) {
            self::$dao= new UtilisateurDAO();
        }
        return self::$dao;
    }

  
    
    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnexion();
        $query = "select * from User order by nom,prenom";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Utilisateur');
        return $results;
    }

    public final function insert(Utilisateur $st): void{
        if($st instanceof Utilisateur){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            // prepare the SQL statement
            $query = "INSERT INTO User(adressMail,motDePasse,nom,prenom,sexe,dateNaissance,poids,taille) VALUES (:m,:pw,:n,:pn,:s,:b,:p,:t);";
            $stmt = $dbc->prepare($query);
            // bind the paramaters
            $stmt->bindValue(':n',$st->getNom(),PDO::PARAM_STR);
            $stmt->bindValue(':pn',$st->getPrenom(),PDO::PARAM_STR);
            $stmt->bindValue(':m',$st->getMail(),PDO::PARAM_STR);
            $stmt->bindValue(':pw',$st->getMdp(),PDO::PARAM_STR);
            $stmt->bindValue(':s',$st->getSexe(),PDO::PARAM_STR);
            $stmt->bindValue(':b',$st->getNaissance(),PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPoid(),PDO::PARAM_INT);
            $stmt->bindValue(':t',$st->getTaille(),PDO::PARAM_INT);
            
            // execute the prepared statement
            $stmt->execute();
            $st->setId(intval($dbc->lastInsertId()));
        }
    }

    public function find(String $email,String $mdp ): Array{
        $dbc = SqliteConnection::getInstance()->getConnexion();
        $query = "select * from User where adressMail = '" .$email. "' And motDePasse = '" .$mdp. "'";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Utilisateur');
        return $results;
    }


   public function delete(Utilisateur $obj): void { 
    if($obj instanceof Utilisateur){
        $dbc = SqliteConnection::getInstance()->getConnexion();
        // prepare the SQL statement
        $query = "DELETE FROM User WHERE id = :id;";
        $stmt = $dbc->prepare($query);
        // bind the paramaters
        $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_INT);
        

        // execute the prepared statement
        $stmt->execute();
    }

    }

    public function deleteAll(Utilisateur $obj): void { 
        if($obj instanceof Utilisateur){
            $dbc = SqliteConnection::getInstance()->getConnexion();
            // prepare the SQL statement
            $query = "DELETE FROM User";
            $stmt = $dbc->prepare($query);
            // bind the paramaters
            
            // execute the prepared statement
            $stmt->execute();
        }
    
        }


 

  public function update(Utilisateur $obj): void {
    if($obj instanceof Utilisateur){
        $dbc = SqliteConnection::getInstance()->getConnexion();
        // prepare the SQL statement
        $query = "UPDATE User SET adressMail = :m, motDePasse = :pw, nom = :n, prenom =:p, sexe = :s, dateNaissance = :b, poids = :p, taille = :t WHERE id = :id;";
        $stmt = $dbc->prepare($query);
        // bind the paramaters
        $stmt->bindValue(':id',$obj->getId(),PDO::PARAM_INT);
        $stmt->bindValue(':n',$obj->getNom(),PDO::PARAM_STR);
        $stmt->bindValue(':p',$obj->getPrenom(),PDO::PARAM_STR);
        $stmt->bindValue(':m',$obj->getMail(),PDO::PARAM_STR);
        $stmt->bindValue(':pw',$obj->getMdp(),PDO::PARAM_STR);
        $stmt->bindValue(':s',$obj->getSexe(),PDO::PARAM_STR);
        $stmt->bindValue(':b',$obj->getNaissance(),PDO::PARAM_STR);
        $stmt->bindValue(':p',$obj->getPoid(),PDO::PARAM_INT);
        $stmt->bindValue(':t',$obj->getTaille(),PDO::PARAM_INT);
        
        // execute the prepared statement
        $stmt->execute();
    }

  }
}
?>