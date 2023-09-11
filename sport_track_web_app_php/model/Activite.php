<?php
class Activite{
	private int $id = 0;
	private string $date;
	private string $description;
  private int $idUser = 0;

    public function  __construct() { }
    public function init( $date, $description){
		$this->id = -1;
		$this->date = $date;
		$this->description = $description;
    }

	  public function getId(): int { return $this->id; }
    public function setId(int $identifiant): void {$this->id = $identifiant;}
    public function getDate(): string { return $this->date; }
    public function setDate(String $date): void {$this->date = $date;}
    public function getDesc(): string { return $this->description; }
    public function setDesc(String $description): void {$this->description = $description;}
    public function getIdUser(): int { return $this->idUser; }
    public function setIdUser(int $identifiant): void {$this->idUser = $identifiant;}
    public function  __toString(): string { 
		return $this->id. " ". $this->date. " ".$this->description ." ".$this->idUser;
		}
}
?>
