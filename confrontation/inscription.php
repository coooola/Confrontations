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
		if ($_POST['pass1']==$_POST['pass2'])
		{
			$pseudo= addslashes($_POST['pseudo']);
			$req = $BDD->query("SELECT pseudojoueur, passjoueur FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo'");
			$chk_pseudo = $req->fetch(PDO::FETCH_ASSOC);
			if(!empty($_POST) && $chk_pseudo == '1' || $chk_pseudo>'1')
			{
				header( "refresh:5;url=index.php" ); 
				echo 'Ce pseudo est déjà pris. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.'; 
			}
			else
			{
				$pass = sha1(md5(sha1($_POST['pass1'])));
				$req='INSERT INTO "FindMentor"."Joueur" (pseudoJoueur, passJoueur, ligueJoueur, divisionJoueur,admin) VALUES (\''.$_POST['pseudo'].'\',\''.$pass.'\',\''.$_POST['ligue'].'\',\''.$_POST['division'].'\',FALSE);';
				$result = $BDD->query($req);
				
				header( "refresh:5;url=index.php" ); 
				echo ' Vous êtes désormais inscrit et vous pouvez vous connecter. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.'; 
			}
		}
		else
		{
			header( "refresh:5;url=index.php" ); 
			echo 'Les mots de passes ne correspondent pas. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
		}
	}
	?>
<br />
