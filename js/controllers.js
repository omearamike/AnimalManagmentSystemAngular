
app.controller('displayCtrl', function($scope, $http) {
    $scope.nameFilter = null;
    $scope.animalList = [];

      // Inserts data to the database based on Array submitted from user input
      $scope.insertdata = function() {
          console.log($scope);
          $http.post("functions/create_animal.php", {'tagId':$scope.user.tagId, 'breed_name':$scope.user.breed_name, 'dob':$scope.user.dob, 'sex':$scope.user.sex, 'notes':$scope.user.notes});
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


        // retrieve record to fill out the form
        $scope.readOne = function(tag_id){

          // change modal title
          $('#modal-animal-title').text("Edit Animal");

          // show udpate product button
          $('#btn-update-animal').show();

          // show create product button
          $('#btn-create-animal').hide();

          // post id of product to be edited
          $http.post("functions/read_one.php", {
              'tag_id' : tag_id
          })
          .success(function(data, status, headers, config){


              // put the values in form
              $scope.tag_id = data[0]['tag_id'];
              $scope.breed_name = data[0]['breed_name'];
              $scope.sex_type = data[0]['sex_type'];
              $scope.dob = data[0]['dob'];
              $scope.notes= data[0]['notes'];

              // $scope.name = data[0]["name"];
              // $scope.description = data[0]["description"];
              // $scope.price = data[0]["price"];

              // show modal
              $('#modal-animal-form').modal('open');
                          Materialize.toast('Record Retrieved', 2000);
          })
          .error(function(data, status, headers, config){
              Materialize.toast('Unable to retrieve record.', 4000);
          });
          }


        // update product record / save changes
        $scope.updateAnimal = function(){
            $http.post('functions/update_animal.php', {
                'tag_id' : $scope.tag_id,
                'breed_name' : $scope.breed_name,
                'sex_type' : $scope.sex_type,
                'dob' : $scope.dob,
                'notes' : $scope.notes
            }).success(function (data, status, headers, config){
                // tell the user product record was updated
                Materialize.toast(data, 4000);

                // close modal
                $('#modal-animal-form').modal('close');

                // clear modal content
                $scope.clearForm();

                // refresh the product list
                $scope.getAll();
            }).error(function(data, status, headers, config){
                Materialize.toast(data, 4000);
            });;
        }


        $scope.showCreateForm = function(){
            // clear form
            $scope.clearForm();

            // change modal title
            $('#modal-product-title').text("Create New Product");

            // hide update product button
            $('#btn-update-product').hide();

            // show create product button
            $('#btn-create-product').show();

        }

          // clear variable / form values
          $scope.clearForm = function(){
              $scope.id = "";
              $scope.name = "";
              $scope.description = "";
              $scope.price = "";
          }

          // create new product
          $scope.createProduct = function(){

              // fields in key-value pairs
              $http.post('create_product.php', {
                      'name' : $scope.name,
                      'description' : $scope.description,
                      'price' : $scope.price
                  }
              ).success(function (data, status, headers, config) {
                  console.log(data);
                  // tell the user new product was created
                  Materialize.toast(data, 4000);

                  // close modal
                  $('#modal-product-form').modal('close');

                  // clear modal content
                  $scope.clearForm();

                  // refresh the list
                  $scope.getAll();
              });
          }

});
