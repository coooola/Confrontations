<?php

	include 'connexionBase.php';
	if (is_numeric($_GET['num'])) 
	{
		if (!isSet($_COOKIE['pseudo']) || empty($_COOKIE['pseudo'])) 
		{
			header( "refresh:5;url=index.php" ); 
			echo 'Vous devez vous connecter pour vous désinscrire !. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.'; 
		}
		else 
		{
			$pseudo = $_COOKIE['pseudo'];
			$req = $BDD->query("SELECT * FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo';");
			$donnees = $req->fetch(PDO::FETCH_ASSOC);
			
			$req='DELETE FROM "FindMentor"."Participation" WHERE numjoueur = '.$donnees['numjoueur'].' AND numconfrontation = '.$_GET['num'].';';
			$result = $BDD->query($req);
			
			header( "refresh:5;url=index.php" ); 
			echo ' Vous vous êtes désinscrit de la confrontation n°'.$_GET['num'].'. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
		}
	}
	else
	{
		header( "refresh:5;url=index.php" ); 
		echo "arrête de modifier mon url svp";
	}			
?>