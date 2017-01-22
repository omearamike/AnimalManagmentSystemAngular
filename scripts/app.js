app = angular.module('myapp', ['ngRoute', 'myapp.widget', 'myapp.draggable', 'myapp.tabs', 'ngAnimate', 'toaster']);

app.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider
            .when('/herdnumber/farm/feedlot', {
                title: 'Manage Feedlot',
                templateUrl: 'pages/viewfeedlot.php',
                controller: 'feedlotController'})

            .when('/herdnumber/farm/feedlot/:lot_id', {
                title: 'View feedlot',
                templateUrl: 'pages/viewfeedlotid.php'})
            }]);
