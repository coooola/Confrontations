(function() {
	
  var app = angular.module('directives', []);

    app.directive("navbar", function() {
      return {
        restrict: 'E',
        templateUrl: "navbar.php"
      };
    });
	
	app.directive("planning", function() {
      return {
        restrict: 'E',
        templateUrl: "planning.php",
		controller: function()
		{
			this.current=0;
			this.currentParticipants=0;

			this.isSet = function(checkTab) {
			return this.current === checkTab;
			};
			
			this.isSetPart = function(checkTab) {
			return this.currentParticipants === checkTab;
			};

			this.setTab = function(setTab, setPart) {
			this.current = setTab;
			this.currentParticipants = setPart;
			};
	
		}, 
		controllerAs : 'cal'
      };
    });
	
	app.directive("accueil", function() {
      return {
        restrict: 'E',
        templateUrl: "accueil.php"
      };
    });
	
	app.directive("templates", function() {
      return {
        restrict: 'E',
        templateUrl: "template.php"
      };
    });
	
	app.directive("stream", function() {
      return {
        restrict: 'E',
        templateUrl: "stream.php"
      };
    });
	
	app.directive("inscriptionconnecte", function() {
      return {
        restrict: 'E',
        templateUrl: "inscriptionconnecte.php"
      };
    });
	
	app.directive("participation", function() {
      return {
        restrict: 'E',
        templateUrl: "participation.php"
      };
    });
	
})();
