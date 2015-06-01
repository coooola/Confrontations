<?php
include 'connexionBase.php';
class Confrontation {

	private $numJoueur ;
	private $pseudoJoueur;
	private $passJoueur;
	private $ligueJoueur;
	private $divisionJoueur;
	
	//constructeur
	public function __construct ($numJoueur,$pseudoJoueur,$passJoueur, $ligueJoueur, $divisionJoueur) 
	{
		$this->numJoueur=$numJoueur;
		$this->pseudoJoueur=$pseudoJoueur;
		$this->passJoueur=$passJoueur;
		$this->ligueJoueur=$ligueJoueur;
		$this->divisionJoueur=$divisionJoueur;
	}
	
	//les getteurs
	public function getNumJoueur ()
	{
	return $this->numJoueur;
	}
	
	public function getPseudoJoueur ()
	{
	return $this->pseudoJoueur;
	}
	
	public function getPassJoueur ()
	{
	return $this->passJoueur;
	}
	
	public function getLigueJoueur ()
	{
	return $this->ligueJoueur;
	}
	
	public function getDivisionJoueur ()
	{
	return $this->divisionJoueur;
	}
	

	
	//les setteurs
	public function setNumJoueur ($numJoueur)
	{
	$this->numJoueur=$numJoueur;
	}
	
	public function setPseudoJoueur ($pseudoJoueur)
	{
	$this->pseudoJoueur=$pseudoJoueur;
	}
	
	public function setPassJoueur ($passJoueur)
	{
	$this->passJoueur=$passJoueur;
	}
	
	public function setLigueJoueur ($ligueJoueur)
	{
	$this->ligueJoueur=$ligueJoueur;
	}
	
	public function setDivisionJoueur ($divisionJoueur)
	{
	$this->divisionJoueur=$divisionJoueur;
	}
	
	
	
	public function saveJoueur ()
	{
		$req="INSERT INTO 'Joueur' (numJoueur,pseudoJoueur,passJoueur,ligueJoueur,divisionJoueur) VALUES ('".$this->numJoueur."','".$this->pseudoJoueur."','".$this->passJoueur."','".$this->ligueJoueur."','".$this->divisionJoueur."'); ";
		$reponse = $BDD->query($req);
	}
	
	public function updateJoueur($numJoueur, $pseudoJoueur, $passJoueur, $ligueJoueur, $divisionJoueur)
	{
		$req = 'UPDATE "Joueur" SET pseudoJoueur=".'$pseudoJoueur.'", passJoueur="'.$passJoueur.'", ligueJoueur=".'$ligueJoueur.'", divisionJoueur=".'$divisionJoueur.'" WHERE numJoueur='.$numJoueur.';';
		$reponse = $BDD->query($req);
	}
	
	public function getConfrontationInscrit($numJoueur)
	{
		$req='SELECT C.numConfrontation, C.nomConfrontation, C.dateConfrontation FROM "Confrontation" C, "Participation" P WHERE P.numJoueur = '.$numJoueur.' AND P.numConfrontation = C.numConfrontation;';
		$reponse = $BDD->query($req);
	}
	
	public function getConfrontationParticipation($numJoueur)
	{
		$req='SELECT C.numConfrontation, C.nomConfrontation, C.dateConfrontation FROM "Confrontation" C, "Participation" P WHERE P.numJoueur = '.$numJoueur.' AND P.Participation=TRUE AND P.numConfrontation = C.numConfrontation;';
		$reponse = $BDD->query($req);
	}
	
	
}

?>