angular.module('animalapp.controllers', []).

controller('formCtrl', function($scope, $http) {
    $scope.insertdata = function() {
        console.log($scope);
        $http.post("functions/create_animal.php", {'tagId':$scope.user.tagId, 'breed_id':$scope.user.breed_id, 'dob':$scope.user.dob, 'sex':$scope.user.sex, 'notes':$scope.user.notes});
        // $http.post("insert.php", {'firstName':$scope.firstName, 'lastName':$scope.lastName}).success(function(data,status,headers,config){console.log()});
      };
});
