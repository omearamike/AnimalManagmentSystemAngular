app.controller('feedlotCtrl', function ($scope, $http) {

    $scope.nameFilter = null;
    $scope.feedlotList = [];

    $scope.getAllFeedlot = function () { // Returns all animals from database
        $http.get("functions/Feedlot/getAllFeedlots.php").success(function (response) {
            // console.log(response);
            $scope.feedlotList = response;
        });
    };

    $scope.showCreateForm = function () { //shows form for creating a new feedlot

        $scope.clearForm(); // clear form

        $('#modal-feedlot-title').text("Create New Product"); // change modal title
        $('#modal-feedlot-form').hide(); // hide update product button
        $('#modal-feedlot-form').show(); // show create product button

    };

    $scope.clearForm = function () { // clear variable / form values
        //   $scope.tag_id = "";
        //   $scope.breed_name = "";
        //   $scope.sex_type = "";
        //   $scope.dob = "";
        //   $scope.notes = "";
    };

    $scope.createFeedlot = function () { // Creates a new feedlot

        $http.post('functions/Feedlot/createFeedlot.php', { // fields in key-value pairs
            'name': $scope.name,
        }).success(function (data, status, headers, config) {
            //   console.log(data);

            Materialize.toast(data, 4000); // tell the user new product was created

            $('#modal-feedlot-form').modal('close'); // close modal

            $scope.clearForm(); // clear modal content
            $scope.getAllFeedlot(); // refresh the list
        });
    };

    $scope.closeForm = function () { // closes form
        $('#modal-feedlot-form').modal('destroy'); // close modal
        $scope.clearForm(); // clear modal content
    };

});



app.controller('viewFeedlotCtrl', function ($scope, $routeParams, $http) {

    $scope.feedlotDetails = [];

    $scope.feedlot_id = $routeParams.feedlot_id; // receives feedlot_id param from url

    $scope.test = function () {
        console.log($scope.feedlot_id);
    };

    $scope.getSingleFeedlotDetails = function () { //displays all details of single feedlot

        $http.post('functions/Feedlot/getSingleFeedlotDetails.php', { // fields in key-value pairs
            'feedlot_id': $scope.feedlot_id, //passes lot_id to the read_feedlotid.php function
        }).success(function (data, status, headers, config) {
            //  console.log(data);
            $scope.feedlotDetails = data;

            Materialize.toast(status, 200); // tell the user new product was created

        });
    };

    $scope.getSingleFeedlotAnimals = function () {
            $http.post('functions/Feedlot/getSingleFeedlotAnimals.php', {
                'feedlot_id': $scope.feedlot_id, //passes lot_id to the read_feedlotid.php function
            }).success(function (data, status, headers, config) {
                //  console.log(data);
                $scope.feedlotAnimals = data;

                Materialize.toast(status, 200); // tell the user new product was created

            });
        };

    $scope.moveAnimalFeedlot = function (lot_id, tag_id) {
        //   console.log(tag_id);
        $http.post('functions/Feedlot/moveAnimalFeedlot.php', { // fields in key-value pairs
                'lot_id': lot_id, //passes lot_id to the read_feedlotid.php function
                'tag_id': tag_id //passes lot_id to the read_feedlotid.php function
            }
        ).success(function (data, status, headers, config) {

            Materialize.toast(data, 200); // tell the user new product was created
            $scope.getSingleFeedlotAnimals();

        });
    };

    $scope.removeAnimal = function (tag_id) {

        $http.post('functions/Feedlot/removeAnimal.php', { // fields in key-value pairs
                'tag_id': tag_id //passes lot_id to the read_feedlotid.php function
            }
        ).success(function (data, status, headers, config) {

            Materialize.toast(data, 200); // tell the user new product was created
            $scope.getSingleFeedlotAnimals();

        });

    }


});
