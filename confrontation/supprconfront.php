<?php

	include 'connexionBase.php';
	$pseudo = $_COOKIE['pseudo'];
	$req = $BDD->query("SELECT admin FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo'"); 
	$donnees = $req->fetch(PDO::FETCH_ASSOC);
	if ($donnees['admin']!='TRUE') { header('Location: index.php'); }
	
	$req="DELETE FROM \"FindMentor\".\"Confrontation\" WHERE numconfrontation='".$_POST['numC']."'; ";
	$reponse = $BDD->query($req);
	header( "Location: panneauadmin.php" ); 
	echo 'Confrontation créée <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
?>