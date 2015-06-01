<?php
	include 'connexionBase.php';
	$pseudo = $_COOKIE['pseudo'];
	$req = $BDD->query("SELECT admin FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo'"); 
	$donnees = $req->fetch(PDO::FETCH_ASSOC);
	if ($donnees['admin']!='TRUE') { header('Location: index.php'); }

	$subject = $_POST['nom'];
	$pattern = '/[][(){}<>\/+"*%&=?`^\'!$_:;,-]/';
	if (preg_match($pattern, $subject, $matches))
	{
	   echo "La chaine contient des caractères spéciaux";
	}
	else
	{
   // La chaine ne contient pas de caractères spéciaux

	$req="INSERT into \"FindMentor\".\"Confrontation\" (nomconfrontation,dateconfrontation) VALUES ('".$_POST['nom']."','".$_POST['date']." ".$_POST['heure'].":".$_POST['minute'].":00'); ";
	$reponse = $BDD->query($req);
	header( "Location: panneauadmin.php" ); 
	echo 'Confrontation créée <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
	}
	?>