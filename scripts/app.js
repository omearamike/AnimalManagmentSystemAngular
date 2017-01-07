var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'toaster']);

app.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/login', {
            title: 'Login',
            templateUrl: 'partials/Authentication/login.html',
            controller: 'authCtrl'
        })
            .when('/logout', {
                title: 'Logout',
                templateUrl: 'partials/Authentication/login.html',
                controller: 'logoutCtrl'
            })
            .when('/signup', {
                title: 'Signup',
                templateUrl: 'partials/Authentication/signup.html',
                controller: 'authCtrl'
            })
            .when('/create', {
              templateUrl: 'partials/Animal/create.php',
              controller: 'animalCtrl'})
            .when('/display',
                {title: 'Display',
                templateUrl: 'partials/Animal/display.php',
                controller: 'animalCtrl'})
            .when('/managefeedlot',
                {title: 'Manage Feedlot',
                templateUrl: 'partials/Feedlot/display.php',
                controller: 'feedlotCtrl'})
            .when('/animal/view',
                {title: 'Manage Feedlot',
                templateUrl: 'partials/Animal/view.php',
                controller: 'viewAnimalCtrl'})
            .when('/feedlot/view/:feedlot_id',
                {title: 'View Feedlot',
                templateUrl: 'partials/Feedlot/view.php',
                controller: 'viewFeedlotCtrl'})
            .when('/dashboard', {
                title: 'Dashboard',
                templateUrl: 'partials/Authentication/dashboard.html',
                controller: 'authCtrl'
            })
            .when('/', {
                title: 'Login',
                templateUrl: 'partials/Authentication/login.html',
                controller: 'authCtrl',
                role: '0'
            });
            // .otherwise({
            //     redirectTo: '/login'
            // });

  }])
    .run(function ($rootScope, $location, Data) {
        $rootScope.$on("$routeChangeStart", function (event, next, current) {
            $rootScope.authenticated = false;
            Data.get('session').then(function (results) {
                if (results.uid) {
                    $rootScope.authenticated = true;
                    $rootScope.uid = results.uid;
                    $rootScope.name = results.name;
                    $rootScope.email = results.email;
                    $rootScope.herdnumber = results.herdnumber;
                } else {
                    var nextUrl = next.$$route.originalPath;
                    if (nextUrl == '/signup' || nextUrl == '/login') {

                    } else {
                        $location.path("/login");
                    }
                }
            });
        });
    });
