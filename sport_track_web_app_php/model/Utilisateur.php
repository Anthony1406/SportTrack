<?php
class Utilisateur{
	private int $id = 0;
	private string $mail;
	private string $mdp;
    private string $nom;
    private string $prenom;
    private string $sexe;
    private int $poid;
    private int $taille;
    private String $naissance;

    public function  __construct() { }
    public function init($mail, $mdp, $n, $p, $sexe, $poid, $taille, $naissance){
      
        $this->id = -1;
      
		$this->mail = $mail;
		$this->mdp = $mdp;
        $this->nom = $n;
        $this->prenom = $p;
        $this->sexe = $sexe;
        $this->poid = $poid;
        $this->taille = $taille;
        $this->naissance = $naissance;
    }

    public function getId(): int { return $this->id; }
    public function setId(int $identifiant): void {$this->id = $identifiant;}
    public function getMail(): string { return $this->mail; }
    public function setMail(String $mail): void {$this->mail = $mail;}
    public function getMdp(): string { return $this->mdp; }
    public function setMdp(String $mdp): void {$this->mdp = $mdp;}
    public function getNom(): string { return $this->nom; }
    public function setNom(String $nom): void {$this->nom = $nom;}
    public function getPrenom(): string { return $this->prenom; }
    public function setPrenom(String $prenom): void {$this->prenom = $prenom;}
    public function getSexe(): string { return $this->sexe; }
    public function setSexe(String $sexe): void {$this->sexe = $sexe;}
    public function getPoid(): string { return $this->poid; }
    public function setPoid(int $poid): void {$this->poid = $poid;}
    public function getTaille(): string { return $this->taille; }
    public function setTaille(int $taille): void {$this->taille = $taille;} 
    public function getNaissance(): string { return $this->naissance; }
    public function setNaissance(string $Nait) {return $this->naissance = $Nait;}  
    public function  __toString(): string { 
		return $this->id. " ". $this->mail. " ".$this->mdp. " ". $this->prenom.$this->nom. " ". $this->sexe. " ".$this->poid. " ". $this->taille. " ".$this->naissance;
		}
}
?>
