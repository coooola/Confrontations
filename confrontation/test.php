<?php

	include 'connexionBase.php';
	
	if ($_POST['pass1']==$_POST['pass2'])
	{
	$req='INSERT INTO "FindMentor"."Joueur" (pseudoJoueur, passJoueur, ligueJoueur, divisionJoueur,admin) VALUES (\''.$_POST['pseudo'].'\',\''.$_POST['pass1'].'\',\''.$_POST['ligue'].'\',\''.$_POST['division'].'\',FALSE);';
	$result = $BDD->query($req);
	
	header( "refresh:5;url=index.php" ); 
	echo ' Vous êtes désormais inscrit et vous pouvez vous connecter. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.'; 

	}
	else
	{
		echo 'lol le mec sait pas écrire deux fois son mdp <br />';
	}
	?>
<br />
