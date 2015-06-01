<!-- Boite de dialogue test -->


<!-- Boite de dialogue pour l'inscription -->

<script type="text/ng-template" id="inscriptionDialog" >


		<form class="form-signin" action="inscription.php" method="POST" id="formInscription" >
		<h2 class="form" >Inscription</h2>
			<input type="text" id="inputPseudo" name="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
			
			<input type="password" id="inputPassword" name="pass1" class="form-control" placeholder="Mot de passe" required>
			
			<input type="password" id="inputPasswordReview" name="pass2" class="form-control" placeholder="Retapez votre mot de passe" required>
			
			<select class="form-control" name="ligue">
				  <option>Bronze</option>
				  <option>Argent</option>
				  <option>Or</option>
				  <option>Platine</option>
				  <option>Diamant</option>
				  <option>Master</option>
				  <option>Challenger</option>
			</select>
			
			<select class="form-control" name="division">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
			</select>
			
			<button class="btn btn-lg btn-primary center-block" type="submit" form="formInscription">S'inscrire !</button>
		</form>
		<!--
		<div class="ngdialog-buttons" ng-controller = 'InsideCtrl'>
       
            <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="openSecond()">Open next</button>
        </div>-->
</script>




<!-- Boite de dialogue pour la connexion -->

	  <script type="text/ng-template" id="connectionDialog" >


		<form class="form-signin" action="connexion.php" method="POST" id="formConnexion">
		<h2 class="form">Connexion</h2>
			<input type="text" id="inputPseudo" name="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
			
			<input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Mot de passe" required>
			
			<div class="checkbox">
				<label>
					<input type="checkbox" value="true" name="remember"> Se souvenir de moi
				</label>
			</div>
			
			
		</form>
			<button class="btn btn-lg btn-primary center-block" type="submit" form="formConnexion">Se connecter</button>
</script>


<!-- Boite de dialogue profil -->

<script type="text/ng-template" id="profilDialog" >

		<?php

	include 'connexionBase.php';
	$pseudo = $_COOKIE['pseudo'];
    $req = $BDD->query("SELECT * FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo'");
	$donnees = $req->fetch(PDO::FETCH_ASSOC)
	?>

		<form class="form-signin" action="modifProfil.php" method="POST" id="formProfil">
		
			<h2 class="form">Votre profil </h2>

			
			<input type="text" id="inputPseudo" name="pseudo" class="form-control"  value="<?php echo $donnees['pseudojoueur']; ?>" required autofocus>
			
			
			<input type="password" id="inputPassword" name="pass" class="form-control" placeholder ="Mot de passe actuel (à remplir pour toute modification)" required>
			
			<input type="password" id="inputPassword2" name="newpass" class="form-control" placeholder ="Nouveau mot de passe (à remplir seulement si vous voulez modifier votre mot de passe)" >
			
			<input type="password" id="inputPassword3" name="newpass2" class="form-control" placeholder ="Confirmer votre nouveau mot de passe" >
			
			<select class="form-control" name="ligue">
				  <option <?php if ($donnees['liguejoueur']=="Bronze") echo 'selected' ?> >Bronze</option>
				  <option <?php if ($donnees['liguejoueur']=="Argent") echo 'selected' ?> >Argent</option>
				  <option <?php if ($donnees['liguejoueur']=="Or") echo 'selected' ?> >Or</option>
				  <option <?php if ($donnees['liguejoueur']=="Platine") echo 'selected' ?> >Platine</option>
				  <option <?php if ($donnees['liguejoueur']=="Diamant") echo 'selected' ?> >Diamant</option>
				  <option <?php if ($donnees['liguejoueur']=="Master") echo 'selected' ?> >Master</option>
				  <option <?php if ($donnees['liguejoueur']=="Challenger") echo 'selected' ?> >Challenger</option>
			</select>
			
			<select class="form-control" name="division">
				  <option <?php if ($donnees['divisionjoueur']=="1") echo 'selected' ?> >1</option>
				  <option <?php if ($donnees['divisionjoueur']=="2") echo 'selected' ?> >2</option>
				  <option <?php if ($donnees['divisionjoueur']=="3") echo 'selected' ?> >3</option>
				  <option <?php if ($donnees['divisionjoueur']=="4") echo 'selected' ?> >4</option>
				  <option <?php if ($donnees['divisionjoueur']=="5") echo 'selected' ?> >5</option>
			</select>
			

			<button class="btn btn-lg btn-primary " type="submit" form="formProfil">Enregistrer les modifications</button>
			
		</form>

</script>

<script type="text/ng-template" id="secondDialogId">
    <h3><a href="" ng-click="closeSecond()">Close all by click here!</a></h3>
</script>


