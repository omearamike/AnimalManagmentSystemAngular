
app.controller('displayCtrl', function($scope, $http) {
    $scope.nameFilter = null;
    $scope.animalList = [];

      // Inserts data to the database based on Array submitted from user input
      $scope.insertdata = function() {
          console.log($scope);
          $http.post("functions/create_animal.php", {'tagId':$scope.user.tagId, 'breed_id':$scope.user.breed_id, 'dob':$scope.user.dob, 'sex':$scope.user.sex, 'notes':$scope.user.notes});
        };

      // Returns all animals from database
      $scope.getAll = function(){
          $http.get("functions/read_animals.php").success(function(response){
              $scope.animalList = response;
              // console.log($scope.animalList);
          });
      };

      // Counter used for creating an tempepory numbering system on getAll function
        $scope.totalCount = 1;
        $scope.counter = function() {
          return $scope.totalCount++;
        };

        // Defines what values are searched with the searchFilter search bar
        $scope.searchFilter = function (animal) {
            var re = new RegExp($scope.nameFilter, 'i');
            return !$scope.nameFilter || re.test(animal.tag_id);
        };

});
