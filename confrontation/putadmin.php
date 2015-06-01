<?php

	include 'connexionBase.php';
	$req="UPDATE \"FindMentor\".\"Joueur\" SET admin='TRUE' WHERE numjoueur='".$_POST['numJ']."'; ";
	$reponse = $BDD->query($req);
	header( "Location: panneauadmin.php" ); 
	echo 'Confrontation créée <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
?>
