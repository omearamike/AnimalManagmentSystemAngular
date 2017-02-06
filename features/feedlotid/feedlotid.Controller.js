app.controller('feedlotidController', function ($scope, $routeParams, dataFactory) {
    // console.log($routeParams.lot_id, $routeParams.type);
    console.log($routeParams.lot_id);

    $scope.getFeedlotId = function () {
        dataFactory.getFeedlotId($stateParams.id)

            .then(function (response) {
                console.log("response");
                return $scope.feedlotid = response;
            }, function (error) {
                $scope.status = 'Unable to load current feedlot ' + error.message;
            })
    }
});
