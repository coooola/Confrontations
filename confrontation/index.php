<!DOCTYPE html>


<html ng-app="confrontation">
  <head>
	
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

	<!-- Optional theme -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">

	<link rel="stylesheet" type="text/css" href="ngDialog/css/ngDialog.css">
	<!-- Latest compiled and minified JavaScript --> 
	
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="ngDialog/css/ngDialog-theme-default.css">
    <link rel="stylesheet" href="ngDialog/css/ngDialog-theme-plain.css">
    <link rel="stylesheet" href="ngDialog/css/ngDialog-custom-width.css">
	

  </head>
  <body>
	
  
    <div class="container" ng-controller='navbarController as navbarC'>
	
	<templates> </templates>
	<navbar> </navbar>
	
    <accueil ng-show="navbarC.isSet(1)"> </accueil>

	<planning ng-show="navbarC.isSet(2)"> </planning>

	<stream ng-show="navbarC.isSet(3)"> </stream>
	
	<inscriptionconnecte ng-show="navbarC.isSet(5)"> </inscriptionconnecte>
	
	<participation ng-show="navbarC.isSet(6)"> </participation>

	
    </div>
	
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster  -->
	
	<script type="text/javascript" src="angular.js"></script>
	<script type="text/javascript" src="ngDialog/js/ngDialog.js"></script>
	<script type="text/javascript" src="directives.js"></script>
    <script type="text/javascript" src="app.js"></script>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug --
    <script src="js/ie10-viewport-bug-workaround.js"></script> -->
  </body>
</html>
