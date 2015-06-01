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
		$pseudo = $_COOKIE['pseudo'];
		$chgmtPseudo=true;
		if ($pseudo == $_POST['pseudo']) {$chgmtPseudo = false;}
		
		//Si il change de pseudo : changer le cookie + modif base
		//Si pass2 est pas vide : tester ancien + nouveau mdp + modif base
		
		$chgmtmdp = false; 
		if (!empty($_POST['newpass']))  {$chgmtmdp = true;}
			
		$req = $BDD->query("SELECT pseudojoueur, passjoueur FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo'");
		$chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
	

		if(!empty($_POST) && $chk_pseudo == '1' || $chk_pseudo>'1')
		{
			if ($chk_pseudo['passjoueur']==sha1(md5(sha1($_POST['pass'])))) 
			{ 
				if ($chgmtmdp && $_POST['newpass']!=$_POST['newpass2'])
				{
					header( "refresh:5;url=index.php" ); 
					echo 'Erreur dans le changement de mot de passe : les deux mot de passes ne correspondent pas <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
				}
				else if ($chgmtmdp)
				{
					if ($chgmtPseudo)
					{
						setcookie("pseudo",$_POST['pseudo'],time()+3600, null, null, false, true);
						echo 'Tu t\'appelles désormais '.$_POST['pseudo'].'<br /> <br />';
					}
					$newpass = sha1(md5(sha1($_POST['newpass'])));
					$req = 'UPDATE "FindMentor"."Joueur" SET pseudoJoueur=\''.$_POST['pseudo'].'\', passJoueur=\''.$newpass.'\', ligueJoueur=\''.$_POST['ligue'].'\', divisionJoueur=\''.$_POST['division'].'\' WHERE pseudoJoueur=\''.$pseudo.'\';';
					$reponse = $BDD->query($req);
					
					header( "refresh:5;url=index.php" ); 
					echo 'Changements des informations et du mot de passe enregistrés ! <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
				}
				else
				{
					if ($chgmtPseudo)
					{
						setcookie("pseudo",$_POST['pseudo'],time()+3600, null, null, false, true);
						echo 'Tu t\'appelles désormais '.$_POST['pseudo'].'<br /> <br />';
					}
					$req = 'UPDATE "FindMentor"."Joueur" SET pseudoJoueur=\''.$_POST['pseudo'].'\', ligueJoueur=\''.$_POST['ligue'].'\', divisionJoueur=\''.$_POST['division'].'\' WHERE pseudoJoueur=\''.$pseudo.'\';';
					$reponse = $BDD->query($req);
					
					header( "refresh:5;url=index.php" ); 
					echo 'Changements des informations enregistrés ! <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
				}
			}
			else 
			{
				header( "refresh:5;url=index.php" ); 
				echo 'Mot de passe incorrect. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
			}
		}
	}

?>
