<?php
	
	if (!isSet($_COOKIE['pseudo']) || empty($_COOKIE['pseudo'])) 
	{
		header( "refresh:5;url=index.php" ); 
		echo ' Vous devez êtes connecté pour vous déconnecter. Soyez logique ! <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
	}
	else
	{
		setcookie("pseudo",NULL,-1, null, null, false, true);
		header( "refresh:5;url=index.php" ); 
		echo ' Vous vous êtes déconnecté. <br /> <br /> Vous allez être redirigé dans environ 5 secondes. Si rien ne se passe, cliquez <a href="index.php">ici</a>.';
	}
?>
