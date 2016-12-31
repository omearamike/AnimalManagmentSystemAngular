angular.module('animalapp.controllers', []).

controller('formCtrl', function($scope, $http) {

    $scope.insertdata = function() {
        console.log($scope);
        $http.post("functions/create_animal.php", {'tagId':$scope.user.tagId, 'breed_id':$scope.user.breed_id, 'dob':$scope.user.dob, 'sex':$scope.user.sex, 'notes':$scope.user.notes});
      };

      // read products
      $scope.getAll = function(){
          $http.get("functions/read_animals.php").success(function(response){
              $scope.records = response;
          });
      }

      $scope.totalCount = 0;
      $scope.countInit = function() {
   return $scope.totalCount++;
}

});
