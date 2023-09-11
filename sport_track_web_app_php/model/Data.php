<?php
class Data{
	private int $id;
	private float $freqCardiaque;
	private string $heure;
    private float $longitude;
    private float $latitude;
    private float $altitude;
    private int $idActivity = 0;

    public function  __construct() { }
    public function init($heure, $freqCardiaque, $latitude, $longitude, $altitude){
		  $this->id = -1;
      //print($freqCardiaque."/".$heure."/".$longitude."/".$latitude."/".$altitude);
		  $this->freqCardiaque = $freqCardiaque;
		  $this->heure = $heure;
      $this->longitude = $longitude;
      $this->latitude = $latitude;
      $this->altitude = $altitude;
    }

    public function getId(): int { return $this->id; }
    public function setId($identifiant): void {$this->id = $identifiant;}
    public function getFreq(): float { return $this->freqCardiaque; }
    public function setFreq($freqCardiaque): void {$this->freqCardiaque = $freqCardiaque;}
    public function getH(): string { return $this->heure; }
    public function setH($heure): void {$this->heure = $heure;}
    public function getLong(): float { return $this->longitude; }
    public function setLong($longitude): void {$this->longitude = $longitude;}
    public function getLat(): float { return $this->latitude; }
    public function setLat($latitude): void {$this->latitude = $latitude;}
    public function getAlt(): float { return $this->altitude; }
    public function setAlt($altitude): void {$this->altitude = $altitude;}
    public function getIdAct(): int { return $this->idActivity; }
    public function setIdAct($identifiant): void {$this->idActivity = $identifiant;}
    public function  __toString(): string { 
		return $this->id. " ". $this->freqCardiaque. " ".$this->heure. " ". $this->longitude." ".$this->latitude. " ". $this->altitude. " ". $this->idActivity;
		}
}
?>
