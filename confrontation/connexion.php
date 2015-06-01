<?php

	include 'connexionBase.php';
	
	$subject = $_POST['pseudo'];
	$pattern = '/[][(){}<>\/+"*%&=?`^\'!$_:;,-]/';
	if (preg_match($pattern, $subject, $matches))
	{
		header( "refresh:5;url=index.php" ); 
		echo 'Les caractères spéciaux sont interdits dans le pseudo <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.'; 
	}	
	else
	{
		$pseudo= addslashes($_POST['pseudo']);
		$req = $BDD->query("SELECT pseudojoueur, passjoueur FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo'");
		$chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
		if(!empty($_POST) && $chk_pseudo == '1' || $chk_pseudo>'1')
		{
			if ($chk_pseudo['passjoueur']==sha1(md5(sha1($_POST['pass'])))) { 
				if ($_POST['remember']="true") {setcookie("pseudo",$pseudo,time()+24*365*3600, null, null, false, true);} else {
				setcookie("pseudo",$pseudo,time()+3600, null, null, false, true); }
			header( "refresh:5;url=index.php" ); 
			echo ' Vous êtes connecté '.$_COOKIE['pseudo'].'. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.'; 
			}
			else {header( "refresh:5;url=index.php" ); 
			echo 'Mauvais mot de passe. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';}
		}
		else
		{ header( "refresh:5;url=index.php" ); 
			echo 'Ce pseudo n\'existe pas. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';}
	}
	?>
