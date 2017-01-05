/**
  * @desc This controller will be used to display animal records
  * @function: insertdata(), getAll(), counter(), searchFilter(), readOne(tag_id), updateAnimal(), showCreateForm(), clearForm().
  * @author Jake Rocheleau jakerocheleau@gmail.com
  * @required Is called directly from the client display.php
  * @param $scope: is the scope used to bring data which is with in the displayCtrl Controller scope from client(website)
  * @param $http: Used to create a http request to server
*/
app.controller('authCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    //initially set those objects to null to avoid undefined error
    $scope.login = {};
    $scope.signup = {};
    $scope.doLogin = function (customer) {
        Data.post('login', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }
        });
    };

    $scope.signup = {email:'',password:'',name:'',phone:'',herdnumber:''};
    $scope.signUp = function (customer) {
        Data.post('signUp', {

            customer: customer

        }).then(function (results) {

            Data.toast(results);
            if (results.status == "success") {
                $location.path('dashboard');
            }

        });
    };

    $scope.logout = function () {
        Data.get('logout').then(function (results) {
            Data.toast(results);
            $location.path('login');
        });
    };
});
