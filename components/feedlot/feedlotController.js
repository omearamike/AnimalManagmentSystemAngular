app.controller('feedlotCtrl', function ($scope, $http) {
    $scope.nameFilter = null;
    $scope.feedlotList = [];
    $scope.getAllFeedlot = function () {
        $http.get("functions/Feedlot/getAllFeedlots.php").success(function (response) {
            $scope.feedlotList = response;
        });
    };
    $scope.showCreateForm = function () {
        $scope.clearForm();
        $('#modal-feedlot-title').text("Create New Product");
        $('#modal-feedlot-form').hide();
        $('#modal-feedlot-form').show();
    };

    $scope.closeCreateForm = function () {

        $scope.clearForm();
        $('#modal-feedlot-form').hide();
    };


    $scope.clearForm = function () {
    };

    $scope.createFeedlot = function () {
        $http.post('functions/Feedlot/createFeedlot.php', {
            'name': $scope.name,
        }).success(function (data, status, headers, config) {
            Materialize.toast(data, 4000);
            // $('#modal-feedlot-form').modal('close');
            // $scope.closeForm();
            $scope.closeCreateForm();
            $scope.getAllFeedlot();
        });
    };

});

app.controller('viewFeedlotCtrl', function ($scope, $routeParams, $http) {
    $scope.feedlotDetails = [];
    $scope.feedlot_id = $routeParams.feedlot_id;
    $scope.test = function () {
        console.log($scope.feedlot_id);
    };
    $scope.getSingleFeedlotDetails = function () {
        $http.post('functions/Feedlot/getSingleFeedlotDetails.php', {
            'feedlot_id': $scope.feedlot_id,
        }).success(function (data, status, headers, config) {
            $scope.feedlotDetails = data;
            Materialize.toast(status, 200);
        });
    };
    $scope.getSingleFeedlotAnimals = function () {
        $http.post('functions/Feedlot/getSingleFeedlotAnimals.php', {
            'feedlot_id': $scope.feedlot_id,
        }).success(function (data, status, headers, config) {
            $scope.feedlotAnimals = data;
            Materialize.toast(status, 200);
        });
    };
    $scope.moveAnimalFeedlot = function (lot_id, tag_id) {
        $scope.getSingleFeedlotAnimals();
        $http.post('functions/Feedlot/moveAnimalFeedlot.php', {
            'lot_id': lot_id,
            'tag_id': tag_id
        }).success(function (data, status, headers, config) {
            Materialize.toast(data, 200);
            $scope.getSingleFeedlotAnimals();
        });
    };

    $scope.closeForm = function () {
        $('#modal-allanimals').hide();
        $scope.getSingleFeedlotAnimals();

        // $scope.clearForm();
    };

    $scope.removeAnimal = function (tag_id) {

        $http.post('functions/Feedlot/removeAnimal.php', {
            'tag_id': tag_id
        }).success(function (data, status, headers, config) {
            Materialize.toast(data, 200);

            $scope.getSingleFeedlotAnimals();
        });
    };

    $scope.removeAnimal = function (tag_id) {
        window.alert("I am an alert box!");
        $http.post('functions/Feedlot/removeAnimal.php', {
            'tag_id': tag_id
        }).success(function (data, status, headers, config) {
            Materialize.toast(data, 200);
            $scope.getSingleFeedlotAnimals();
        });
    };

});
