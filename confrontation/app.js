(function() {

var app = angular.module('confrontation', ['directives', 'ngDialog']);

app.controller("navbarController", function($scope, ngDialog, $timeout){
	
	this.current=1;

    this.isSet = function(checkTab) {
      return this.current === checkTab;
    };

    this.setTab = function(setTab) {
      this.current = setTab;
    };
	
	$scope.openInscription = function () {
		ngDialog.open({ template: 'inscriptionDialog', controller: 'InsideCtrl' });
	};
	
	$scope.openConnection = function () {
	var new_dialog = ngDialog.open({ template: 'connectionDialog' });
						// example on checking whether created `new_dialog` is open
						$timeout(function() {
							console.log(ngDialog.isOpen(new_dialog.id));
						}, 2000)
	};
	
	$scope.openProfil = function () {
	var new_dialog = ngDialog.open({ template: 'profilDialog' });
						// example on checking whether created `new_dialog` is open
						$timeout(function() {
							console.log(ngDialog.isOpen(new_dialog.id));
						}, 2000)
	};

	
});

app.controller('InsideCtrl', function ($scope, ngDialog) {
            $scope.dialogModel = {
                message : 'message from passed scope'
            };
            $scope.openSecond = function () {
                ngDialog.open({
                    template: '<h3><a href="" ng-click="closeSecond()">Close all by click here !</a></h3>',
                    plain: true,
                    closeByEscape: false,
                    controller: 'SecondModalCtrl'
                });
            };
        });
		
		app.controller('SecondModalCtrl', function ($scope, ngDialog) {
            $scope.closeSecond = function () {
                ngDialog.close();
	
            };
        });
	
})();