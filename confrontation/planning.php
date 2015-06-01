<div class="table-responsive " >

<?php

	include 'connexionBase.php';
	$req='SELECT * FROM "FindMentor"."Confrontation" WHERE dateconfrontation>current_date;';
	$reponseConfrontation = $BDD->query($req);

	
	
?>

	<table class="table table-striped">
	    <thead >
			<tr>
				  <th>n°</th>
				  <th>Type de confrontation</th>
				  <th>Date et Heure</th>
				  <th>Inscription</th>
				  <th>Nombre d'inscrits</th>
				  <th>Participants</th>
				 

			</tr>
	    </thead>
		<tbody >
		<?php while ($donnees = $reponseConfrontation->fetch())
			{ 
		?>
			<tr >
			
			    <td><?php echo $donnees['numconfrontation'];?></td>
				
			    <td><?php echo $donnees['nomconfrontation'];?></td>
				
			    <td><?php echo $donnees['dateconfrontation'];?></td>
				
				<td>
					<?php if (!isSet($_COOKIE['pseudo']) || empty($_COOKIE['pseudo'])) { ?> 
						<button type="button" class="btn btn-success" ng-click="openInscription()"> S'inscrire </button>
					<?php } else 
					{ 
						$req='SELECT COUNT(*) FROM "FindMentor"."Confrontation" c, "FindMentor"."Joueur" j, "FindMentor"."Participation" p WHERE p.numconfrontation = \''.$donnees['numconfrontation'].'\' AND p.numconfrontation = c.numconfrontation and p.numjoueur = j.numjoueur and j.pseudojoueur =\''.$_COOKIE['pseudo'].'\';';
						$reponseParticipe = $BDD->query($req);
						$participe = $reponseParticipe->fetchColumn();
						if(empty($participe)) {$participe=0;}
						if ($participe==0) {					
					?> 
						<a href="inscriptionconfrontation.php?num=<?php echo $donnees['numconfrontation'];?>"><button type="button" class="btn btn-success" > S'inscrire </button></a>
					<?php } else 
						{ ?>
						<a href="desinscriptionconfrontation.php?num=<?php echo $donnees['numconfrontation'];?>"><button type="button" class="btn btn-success" > Se désinscrire </button></a>
					<?php } 
					} ?>
				</td>
				
				<td><?php
							$req='SELECT COUNT(*) FROM "FindMentor"."Participation" WHERE numconfrontation='.$donnees['numconfrontation'].' GROUP BY numconfrontation;';
							$reponseCount = $BDD->query($req);
							$nbParticipant = $reponseCount->fetchColumn();
							if(empty($nbParticipant)) {$nbParticipant=0;}
							echo $nbParticipant;
					?>
				</td>
				
				<td>
					<button type="button" class="btn btn-info" ng-click="cal.setTab(<?php echo $donnees['numconfrontation'];?>, <?php echo $nbParticipant;?>)" ng-hide="cal.isSet(<?php echo $donnees['numconfrontation'];?>)"> Voir la liste des inscrits</button>
					<button type="button" class="btn btn-info" ng-click="cal.setTab(0,0)" ng-show="cal.isSet(<?php echo $donnees['numconfrontation'];?>)"> Cacher la liste des inscrits</button>
					<br />
					<span ng-show="cal.isSet(<?php echo $donnees['numconfrontation'];?>)" >
					<?php
							
							$req='SELECT j.pseudojoueur, j.liguejoueur, j.divisionjoueur FROM "FindMentor"."Participation" p, "FindMentor"."Joueur" j WHERE numConfrontation='.$donnees['numconfrontation'].' and p.numJoueur = j.numJoueur;';
							$reponseParticipants = $BDD->query($req);
							
							 while ($donneesParticipant = $reponseParticipants->fetch())
					{
					?>
						<span class="pull-left"> <?php echo $donneesParticipant['pseudojoueur'];?> </span>
						<span class="pull-right"> <?php echo $donneesParticipant['liguejoueur'].' '. $donneesParticipant['divisionjoueur'];?> </span>
						<br />
					<?php } ?>
					</span>
					<span ng-show="cal.isSet(<?php echo $donnees['numconfrontation'];?>) && cal.isSetPart(0)" >
						Il n'y a personne d'inscrit pour le moment<br />
					</span>
				</td>
			
			</tr>
			<?php } ?>
		</tbody>
	</table>
	

</div>




