var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'toaster']);

app.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/login', {
            title: 'Login',
            templateUrl: 'partials/login.html',
            controller: 'authCtrl'
        })
            .when('/logout', {
                title: 'Logout',
                templateUrl: 'partials/login.html',
                controller: 'logoutCtrl'
            })
            .when('/signup', {
                title: 'Signup',
                templateUrl: 'partials/signup.html',
                controller: 'authCtrl'
            })
            .when('/create', {
              templateUrl: 'partials/create.php',
              controller: 'formCtrl'})
            .when('/display',
                {title: 'Display',
                templateUrl: 'partials/display.php',
                controller: 'formCtrl'})
            .when('/dashboard', {
                title: 'Dashboard',
                templateUrl: 'partials/dashboard.html',
                controller: 'authCtrl'
            })
            .when('/', {
                title: 'Login',
                templateUrl: 'partials/login.html',
                controller: 'authCtrl',
                role: '0'
            })
            .otherwise({
                redirectTo: '/login'
            });
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
// var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'toaster']);
//
// app.config(['$routeProvider',
//   function ($routeProvider) {
//         $routeProvider.
//         when('/login', {
//             title: 'Login',
//             templateUrl: 'partials/login.html',
//             controller: 'autCtrl'
//         })
//             .when('/logout', {
//                 title: 'Logout',
//                 templateUrl: 'partials/login.html',
//                 controller: 'logoutCtrl'
//             })
//             .when('/signup', {
//                 title: 'Signup',
//                 templateUrl: 'partials/signup.html',
//                 controller: 'authCtrl'
//             })
//             .when('/dashboard', {
//                 title: 'Dashboard',
//                 templateUrl: 'partials/dashboard.html',
//                 controller: 'authCtrl'
//             })
//             .when('/', {
//                 title: 'Login',
//                 templateUrl: 'partials/login.html',
//                 controller: 'autCtrl',
//                 role: '0'
//             })
//             .otherwise({
//                 redirectTo: '/login'
//             });
//   }])
    // .run(function ($rootScope, $location, Data) {
    //     $rootScope.$on("$routeChangeStart", function (event, next, current) {
    //         $rootScope.authenticated = false;
    //         Data.get('session').then(function (results) {
    //             if (results.uid) {
    //                 $rootScope.authenticated = true;
    //                 $rootScope.uid = results.uid;
    //                 $rootScope.name = results.name;
    //                 $rootScope.email = results.email;
    //             } else {
    //                 var nextUrl = next.$$route.originalPath;
    //                 if (nextUrl == '/signup' || nextUrl == '/login') {
    //
    //                 } else {
    //                     $location.path("/login");
    //                 }
    //             }
    //         });
    //     });
    // });
    // $routeProvider.
    // 	when("/create",
    //   {templateUrl: "partials/create.php", controller: "formCtrl"}).
    //   when("/display",
    //   {templateUrl: "partials/display.php", controller: "formCtrl"}).
    //   when("/update",
    //   {templateUrl: "partials/update.php", controller: "formCtrl"}).
    //   when("/home",
    //   {templateUrl: "partials/home.php", controller: "formCtrl"}).
    // 	otherwise({redirectTo: '/home'});
