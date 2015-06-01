<!-- Static navbar -->
      <nav class="navbar navbar-default" >
        <div class="container-fluid">
          <div class="navbar-header">
            
            <a class="navbar-brand" href="#">Confrontation de Ligues</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active" ng-class="{ active:navbarC.isSet(1) }"><a href ng-click="navbarC.setTab(1)">Accueil</a></li>
              <li ng-class="{ active:navbarC.isSet(2) }"><a href ng-click="navbarC.setTab(2)">Planning</a></li>
			  <li ng-class="{ active:navbarC.isSet(3) }"><a href ng-click="navbarC.setTab(3)">Stream</a></li>
              <li ng-class="{ active:navbarC.isSet(4) }"><a href ng-click="navbarC.setTab(4)">Contact</a></li>
            </ul>
			
			<!--affichage si non connecté CHANGER LA CONDITION -->
			
            <ul class="nav navbar-nav navbar-right">
			
				<?php if (!isSet($_COOKIE['pseudo']) || empty($_COOKIE['pseudo'])) { ?> 
				<li  class="bg-info"><a href ng-click="openInscription()">S'inscrire</a></li>
				<li ><a href ng-click="openConnection()">Se connecter</a></li>
            
			
			<!--affichage si connecté CHANGER LA CONDITION -->
				<?php } else { 
				include 'connexionBase.php';
				$pseudo = $_COOKIE['pseudo'];
				$req = $BDD->query("SELECT admin FROM \"FindMentor\".\"Joueur\" WHERE pseudojoueur='$pseudo'"); 
				$donnees = $req->fetch(PDO::FETCH_ASSOC);
				
				?>
				<li class="dropdown nav navbar-nav navbar-right">
					<a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false">Connecté en tant que <?php echo $_COOKIE['pseudo']; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href ng-click="openProfil()">Mon profil</a></li>
					  <li ng-class="{ active:navbarC.isSet(5) }"><a href ng-click="navbarC.setTab(5)">Mes inscriptions</a></li>
					  <li ng-class="{ active:navbarC.isSet(6) }"><a href ng-click="navbarC.setTab(6)">Mes participations</a></li>
							<?php if ($donnees['admin']=='TRUE') { ?>
							<li ><a href="panneauadmin.php">Panneau d'administration</a></li>
							<?php }?>
					  <li class="divider"></li>
					  <li><a href="deconnexion.php">Se déconnecter</a></li>
					</ul>
				</li>
				<?php } ?>
			</ul>
			
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
 
  </nav>

	  
	  
	  