// app = angular.module('myapp', ['ngRoute','myapp.widget','myapp.tabs']);
app = angular.module('myapp', ['ngRoute','myapp.widget','myapp.tabs','showcase.withResponsive']);

// app.config([’$routeProvider’,’$locationProvider’,function($routeProvider,$locationProvider){$locationProvider.html5Mode(true);
// }]);

app.config(function($routeProvider) {
	$routeProvider
		.when('/', {
			template: '<h1> Its working again Thanks Guys 😀 🙏</h1>',
            controller: 'controlling2'
		})
		.when('/herdnumber/farm/feedlot', {
		    templateUrl: 'pages/feedlot.page.php',
			controller: 'feedlotController'
		})
		.when('/herdnumber/farm/feedlot/:lot_id', {
		    templateUrl: 'pages/feedlotid.page.php'
		})
		.otherwise({
			redirectTo: '/view1',
            controller: 'controlling1'
		})
});
