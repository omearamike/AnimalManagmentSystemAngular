app = angular.module('myapp', ['ngRoute','myapp.widget','myapp.tabs','showcase.withPromise']);

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

app.controller('homeCtrl', ['$scope', '$http', 'DTOptionsBuilder', 'DTColumnBuilder',
    function ($scope, $http, DTOptionsBuilder, DTColumnBuilder) {
        $scope.dtColumns = [
            DTColumnBuilder.newColumn("FeedlotRecords", "Customer ID"),
            DTColumnBuilder.newColumn("CompanyName", "Company Name"),
            DTColumnBuilder.newColumn("ContactName", "Contact Name"),
            DTColumnBuilder.newColumn("Phone", "Phone"),
            DTColumnBuilder.newColumn("City", "City")
        ]

        $scope.dtOptions = DTOptionsBuilder.newOptions().withOption('ajax', {
            url: "http://localhost/API-FARMAPP/api/v1/src/public/api/v1/feedlots.json",
            type: "GET"
        })
        .withPaginationType('full_numbers')
        .withDisplayLength(10);
    }])
