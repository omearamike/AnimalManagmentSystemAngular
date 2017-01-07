
app.controller('feedlotCtrl', function($scope, $http) {

    $scope.nameFilter = null;
    $scope.feedlotList = [];

    $scope.getAll = function(){ // Returns all animals from database
        $http.get("functions/Feedlot/read_feedlot.php").success(function(response){
            console.log(response);
            $scope.feedlotList = response;
          });
      };

    $scope.showCreateForm = function(){

        $scope.clearForm(); // clear form

        $('#modal-feedlot-title').text("Create New Product"); // change modal title
        $('#modal-feedlot-form').hide(); // hide update product button
        $('#modal-feedlot-form').show(); // show create product button

    };




    $scope.clearForm = function(){ // clear variable / form values
        //   $scope.tag_id = "";
        //   $scope.breed_name = "";
        //   $scope.sex_type = "";
        //   $scope.dob = "";
        //   $scope.notes = "";
    };

    $scope.createFeedlot = function(){

          $http.post('functions/Feedlot/create_feedlot.php', { // fields in key-value pairs
                  'name' : $scope.name,
              }
          ).success(function (data, status, headers, config) {
            //   console.log(data);

              Materialize.toast(data, 4000); // tell the user new product was created

              $('#modal-feedlot-form').modal('close'); // close modal

              $scope.clearForm(); // clear modal content
              $scope.getAll(); // refresh the list
          });
      };

      $scope.closeForm = function(){
          $('#modal-feedlot-form').modal('destroy'); // close modal
          $scope.clearForm(); // clear modal content
      };

});



app.controller('viewFeedlotCtrl', function($scope, $routeParams, $http) {

    $scope.feedlotDetails = [];

   $scope.feedlot_id = $routeParams.feedlot_id; // receives feedlot_id param from url

   $scope.test = function(){
       console.log($scope.feedlot_id);
   };

   $scope.readOne = function(){

         $http.post('functions/Feedlot/read_feedlotid.php', { // fields in key-value pairs
                 'feedlot_id' : $scope.feedlot_id, //passes lot_id to the read_feedlotid.php function
             }
         ).success(function (data, status, headers, config) {
             console.log(data);
             $scope.feedlotDetails = data;

             Materialize.toast(data, 4000); // tell the user new product was created

         });
     };


});
