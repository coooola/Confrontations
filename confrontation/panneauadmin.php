<!DOCTYPE html>
<?php 
				include 'connexionBase.php';
				$pseudo = $_COOKIE['pseudo'];
				$req = $BDD->query("SELECT admin FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo'"); 
				$donnees = $req->fetch(PDO::FETCH_ASSOC);
				if ($donnees['admin']!='TRUE') { header('Location: index.php'); }
				
				?>
<!-- CREATION CONFRONTATION -->

		<form class="form-signin" action="createconfront.php" method="POST" id="createconfront">
		
			<h2 class="form">Créer une nouvelle confrontation</h2>

			
			<label for="inputNom" class="sr-only">Nom de la confrontation</label>
			<input type="text" id="inputNom" name="nom" class="form-control"  value="" required autofocus>
			
			
			<label for="inputdate" class="sr-only">Date de la confrontation</label>
			<input type="date" id="inputdate" name="date" class="form-control" required>
			
			à
			<select class="form-control" name="heure">
				  <option >17</option>
				  <option >18</option>
				  <option >19</option>
				  <option >20</option>
				  <option >21</option>
				  <option >22</option>
				  <option >23</option>
			</select>
			h
			<select class="form-control" name="minute">
				  <option >00</option>
				  <option >15</option>
				  <option >30</option>
				  <option >45</option>
			</select>
			

			<button class="btn btn-lg btn-primary " type="submit" form="createconfront">Créer !</button>
			
		</form>

<!-- SUPPRESSION CONFRONTATION -->

		
		<form class="form-signin" action="supprconfront.php" method="POST" id="supprconfront">
		
			<h2 class="form">Supprimer une confrontation</h2>

			<select class="form-control" name="numC">
<?php

	$req='SELECT * FROM "FindMentor"."Confrontation";';
	$reponseConfrontation = $BDD->query($req);

	while ($donnees = $reponseConfrontation->fetch()){ 	
?>
 <option value="<?php echo $donnees['numconfrontation']?>" > <?php echo $donnees['numconfrontation'].' : '.$donnees['nomconfrontation'];?></option>
<?php } ?>

</select>
<button class="btn btn-lg btn-primary " type="submit" form="supprconfront">Supprimer !</button>
			
</form>

<!-- SUPPRESSION JOUEUR-->

		<form class="form-signin" action="deletejoueur.php" method="POST" id="formdelete">
		
			<h2 class="form">Supprimer un joueur</h2>

			<select class="form-control" name="numJ">
<?php

	$req='SELECT * FROM "FindMentor"."Joueur" WHERE admin=\'FALSE\';';
	$reponseConfrontation = $BDD->query($req);

	while ($donnees = $reponseConfrontation->fetch()){ 	
?>
 <option value="<?php echo $donnees['numjoueur']?>" ><?php echo $donnees['pseudojoueur'];?></option>
<?php } ?>

</select>
<button class="btn btn-lg btn-primary " type="submit" form="formdelete">Supprimer !</button>
			
</form>

<!--ADMIN-->

		<form class="form-signin" action="putadmin.php" method="POST" id="putadmin">
		
			<h2 class="form">Mettre un joueur administrateur</h2>

			<select class="form-control" name="numJ">
<?php
	$req='SELECT * FROM "FindMentor"."Joueur" WHERE admin=\'FALSE\';';
	$reponseConfrontation = $BDD->query($req);

	while ($donnees = $reponseConfrontation->fetch()){ 	
?>
 <option value="<?php echo $donnees['numjoueur']?>" ><?php echo $donnees['pseudojoueur'];?></option>
<?php } ?>

</select>
<button class="btn btn-lg btn-primary " type="submit" form="putadmin">Le mettre admin !</button>
			
</form>

<!--retour -->

<a href='index.php'> Retour au site</a>