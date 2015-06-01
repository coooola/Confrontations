<?php
include 'connexionBase.php';
class Confrontation {

	private $numConfrontation ;
	private $nomConfrontation;
	private $dateConfrontation;

	//constructeur
	public function __construct ($numConfrontation,$nomConfrontation,$dateConfrontation) 
	{
		$this->numConfrontation=$numConfrontation;
		$this->nomConfrontation=$nomConfrontation;
		$this->dateConfrontation=$dateConfrontation;

	}
	
	//les getteurs
	public function getNum ()
	{
	return $this->numConfrontation;
	}
	
	public function getnomConfrontation ()
	{
	return $this->nomConfrontation;
	}
	
	public function getDateConfrontation ()
	{
	return $this->dateConfrontation;
	}
	
	

	
	//les setteurs
	public function setNum ($numConfrontation)
	{
	$this->numConfrontation=$numConfrontation;
	}
	
	public function setnomConfrontation ($nomConfrontation)
	{
	$this->nomConfrontation=$nomConfrontation;
	}
	
	public function setDateConfrontation  ($dateConfrontation)
	{
	$this->dateConfrontation=$dateConfrontation;
	}
	
	
	
	public function saveConfrontation ()
	{
	$req="INSERT into 'Confrontation' (numConfrontation,nomConfrontation,dateConfrontation) VALUES ('".$this->numConfrontation."','".$this->nomConfrontation."','".$this->dateConfrontation."'); ";
	$reponse = $BDD->query($req);
	}
	
	public function getAllConfrontation ()
	{
		$req='SELECT * FROM "FindMentor"."Confrontation";';
		$reponse = $BDD->query($req);
	}
	
	public function getParticipantsFromConfrontation ($numConfrontation)
	{
		$req 'SELECT J.pseudoJoueur, J.ligueJoueur, J.divisionJoueur FROM "Participation" P, "Joueur" J WHERE '.$numConfrontation.' = P.numConfrontation AND P.numJoueur = J.numJoueur;';
		$reponse = $BDD ->query($req);
	}
	
	
}

?>