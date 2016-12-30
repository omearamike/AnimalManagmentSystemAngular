angular.module('animalapp', [
  'animalapp.services',
  'animalapp.controllers',
  'ngRoute'
]).
config(['$routeProvider', function($routeProvider) {
  $routeProvider.
	when("/create",
  {templateUrl: "partials/create.php", controller: "formCtrl"}).
  when("/display",
  {templateUrl: "partials/display.php", controller: "formCtrl"}).
  when("/update",
  {templateUrl: "partials/update.php", controller: "formCtrl"}).
  when("/home",
  {templateUrl: "partials/home.php", controller: "formCtrl"}).
	otherwise({redirectTo: '/home'});
}]);
