app.controller('feedlotController', function ($scope, dataFactory) {

    $scope.getFeedlot = function () {
        dataFactory.getFeedlot()
            .then(function (response) {

                return $scope.feedlots = response.data;
            }, function (error) {
                $scope.status = 'Unable to load customer data: ' + error.message;
            })
    }

});
