app.controller('animalCtrl', function ($scope, $http) {
    $scope.nameFilter = null;
    $scope.animalList = [];
    $scope.insertdata = function () {
        console.log($scope);
        $http.post("functions/Animal/createAnimal.php", {
            'tagId': $scope.user.tagId,
            'breed_name': $scope.user.breed_name,
            'dob': $scope.user.dob,
            'sex': $scope.user.sex,
            'notes': $scope.user.notes
        });
    };
    $scope.getAllAnimals = function () {
        $http.get('functions/Animal/getAllAnimals.php').success(function (response) {
            $scope.animalList = response;
        });
    };

    $scope.totalCount = 1;
    $scope.counter = function () {
        return $scope.totalCount++;
    };
    $scope.searchFilter = function (animal) {
        var re = new RegExp($scope.nameFilter, 'i');
        return !$scope.nameFilter || re.test(animal.tag_id);
    };

    // $scope.showCreateForm = function () {
    //     $scope.clearForm();
    //     $('#modal-feedlot-title').text("Create New Product");
    //     $('#modal-feedlot-form').hide();
    //     $('#modal-feedlot-form').show();
    // };
    $scope.readOne = function (tag_id) {
        $('#modal-animal-title').text("Edit Animal");
        // $('#modal-animal-form').hide();
        $('#modal-animal-form').show();
        $http.post("functions/Animal/getSingleAnimal.php", {
            'tag_id': tag_id
        })
            .success(function (data, status, headers, config) {
            $scope.tag_id = data[0]['tag_id'];
            $scope.breed_name = data[0]['breed_name'];
            $scope.sex_type = data[0]['sex_type'];
            $scope.dob = data[0]['dob'];
            $scope.notes = data[0]['notes'];
            $('#modal-animal-form').modal('open');
            Materialize.toast('Record: ' + $scope.tag_id, 2000);
        })
            .error(function (data, status, headers, config) {
            Materialize.toast('Unable to retrieve record: ' + $scope.tag_id, 2000);
        });
    };


    $scope.closeForm = function () {
        $scope.clearForm();
        $('#modal-animal-form').hide();
    };

    $scope.updateAnimal = function () {
        $http.post('functions/Animal/updateSingleAnimal.php', {
            'tag_id': $scope.tag_id,
            'breed_name': $scope.breed_name,
            'sex_type': $scope.sex_type,
            'dob': $scope.dob,
            'notes': $scope.notes
        }).success(function (data, status, headers, config) {
            Materialize.toast(data, 4000);
            $scope.clearForm();
            $scope.closeForm();
            $scope.getAllAnimals();
        }).error(function (data, status, headers, config) {
            Materialize.toast(data, 4000);
        });
    };
    $scope.showCreateForm = function () {
        $scope.clearForm();
        $('#modal-product-title').text("Create New Product");
        $('#btn-update-product').hide();
        $('#btn-create-product').show();
    };
    $scope.clearForm = function () {
        $scope.tag_id = "";
        $scope.breed_name = "";
        $scope.sex_type = "";
        $scope.dob = "";
        $scope.notes = "";
    };
    $scope.createProduct = function () {
        $http.post('create_product.php', {
            'name': $scope.name,
            'description': $scope.description,
            'price': $scope.price
        }).success(function (data, status, headers, config) {
            console.log(data);
            Materialize.toast(data, 4000);
            $('#modal-product-form').modal('close');
            $scope.clearForm();
            $scope.getAllAnimals();
        });
    };
    $scope.displayAllAnimals = function () {
        $('#modal-allanimals-title').text("Create New Product");
        $('#modal-allanimals').hide();
        $('#modal-allanimals').show();
    };
    $scope.getFeedlotAnimals = function () {
        $http.post('functions/Animal/getAllFeedlotAnimals.php', {
            'lot_id': $scope.lot_id
        }).success(function (data, status, headers, config) {
            Materialize.toast(data, 4000);
        }).error(function (data, status, headers, config) {
            Materialize.toast(data, 4000);
        });
    };


    $scope.addAnimalWeight = function () {
        $http.post('functions/Animal/addAnimalWeight.php', {
            'tag_id': $scope.tag_id
        }).success(function (data, status, headers, config){
            Materialize.toast(data, 4000);
        }).error(function (data, status, headers, config) {
            Materialize.toast(data, 4000);
        });
    };
    
});
