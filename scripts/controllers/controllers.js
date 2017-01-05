/**
  * @desc This controller will be used to display animal records
  * @function: insertdata(), getAll(), counter(), searchFilter(), readOne(tag_id), updateAnimal(), showCreateForm(), clearForm().
  * @author Myk O Meara
  * @required Is called directly from the client display.php
  * @param $scope: is the scope used to bring data which is with in the displayCtrl Controller scope from client(website)
  * @param $http: Used to create a http request to server
*/

app.controller('displayCtrl', function($scope, $http) {
    $scope.nameFilter = null;
    $scope.animalList = [];

      $scope.insertdata = function() { // Inserts data to the database based on Array submitted from user input
          console.log($scope);
          $http.post("functions/Animal/create_animal.php", {'tagId':$scope.user.tagId, 'breed_name':$scope.user.breed_name, 'dob':$scope.user.dob, 'sex':$scope.user.sex, 'notes':$scope.user.notes});
        };

      $scope.getAll = function(){ // Returns all animals from database
          $http.get("functions/Animal/read_animals.php").success(function(response){
              $scope.animalList = response;
            });
        };

      $scope.totalCount = 1; // Counter used for creating an tempepory numbering system on getAll function
      $scope.counter = function() {
          return $scope.totalCount++;
        };


      $scope.searchFilter = function (animal) { // Defines what values are searched with the searchFilter search bar
            var re = new RegExp($scope.nameFilter, 'i');
            return !$scope.nameFilter || re.test(animal.tag_id);
        };


      $scope.readOne = function(tag_id){ // retrieve record to fill out the form

          $('#modal-animal-title').text("Edit Animal"); // change modal title
          $('#btn-update-animal').show(); // show udpate product button
          $('#btn-create-animal').hide(); // show create product button

          $http.post("functions/Animal/read_one.php", { // post id of product to be edited

              'tag_id' : tag_id

          })
          .success(function(data, status, headers, config){

              // put the values in form
              $scope.tag_id = data[0]['tag_id'];
              $scope.breed_name = data[0]['breed_name'];
              $scope.sex_type = data[0]['sex_type'];
              $scope.dob = data[0]['dob'];
              $scope.notes= data[0]['notes'];

          $('#modal-animal-form').modal('open'); // show modal
              Materialize.toast('Record: ' + $scope.tag_id + 'retrieved', 2000);
          })
          .error(function(data, status, headers, config){
              Materialize.toast('Unable to retrieve record: ' + $scope.tag_id, 2000);
          });
        };

        $scope.updateAnimal = function(){ // update product record / save changes
            $http.post('functions/Animal/update_animal.php', {
                'tag_id' : $scope.tag_id,
                'breed_name' : $scope.breed_name,
                'sex_type' : $scope.sex_type,
                'dob' : $scope.dob,
                'notes' : $scope.notes
            }).success(function (data, status, headers, config){

                Materialize.toast(data, 4000); // tell the user product record was updated

                $('#modal-animal-form').modal('close'); // close modal

                $scope.clearForm(); // clear modal content

                $scope.getAll(); // refresh the product list
            }).error(function(data, status, headers, config){
                Materialize.toast(data, 4000);
                });
        };

        $scope.showCreateForm = function(){

            $scope.clearForm(); // clear form

            $('#modal-product-title').text("Create New Product"); // change modal title
            $('#btn-update-product').hide(); // hide update product button
            $('#btn-create-product').show(); // show create product button

        };

        $scope.clearForm = function(){ // clear variable / form values
              $scope.tag_id = "";
              $scope.breed_name = "";
              $scope.sex_type = "";
              $scope.dob = "";
              $scope.notes = "";
        };

        $scope.createProduct = function(){

              $http.post('create_product.php', { // fields in key-value pairs
                      'name' : $scope.name,
                      'description' : $scope.description,
                      'price' : $scope.price
                  }
              ).success(function (data, status, headers, config) {
                  console.log(data);

                  Materialize.toast(data, 4000); // tell the user new product was created

                  $('#modal-product-form').modal('close'); // close modal

                  $scope.clearForm(); // clear modal content
                  $scope.getAll(); // refresh the list
              });
          };

});
