angular.module('animalapp.controllers', []).

controller('formCtrl', function($scope, $http) {
    $scope.insertdata = function() {
        console.log($scope);
        $http.post("functions/create_animal.php", {'tagId':$scope.user.tagId, 'breed_id':$scope.user.breed_id, 'dob':$scope.user.dob, 'sex':$scope.user.sex, 'notes':$scope.user.notes});
        // $http.post("insert.php", {'firstName':$scope.firstName, 'lastName':$scope.lastName}).success(function(data,status,headers,config){console.log()});
      };

      // read products
      $scope.getAll = function(){
          $http.get("functions/read_animals.php").success(function(response){
              $scope.records = response;
              // echo json_encode($scope.names);
              console.log("This is the get all clss");
              console.log($scope.records);
          });
      }

    //   $scope.getAll = function(){
    //   $http.get("functions/read_animals.php").success(function (response) {
    //   /*After Successfully fetch the data from JSON file assigning these data to $scope object variable*/
    //   $scope.table = response;
    //   });
    // }
});
