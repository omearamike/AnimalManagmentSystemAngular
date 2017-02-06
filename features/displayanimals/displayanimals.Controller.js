app.controller('animalController', function ($scope, dataFactory) {
    $scope.getFeedlot = function () {
        dataFactory.getFeedlot()
            .then(function (response) {
                return $scope.feedlots = response.data;
            }, function (error) {
                $scope.status = 'Unable to load customer data: ' + error.message;
            })
    }
});

$tables = angular.module('showcase.withResponsive', ['datatables', 'ngResource']);

$tables.controller('AngularWayOneTimeBindingCtrl', function($scope, $resource, dataFactory, DTOptionsBuilder) {

    var vm = this;
    dataFactory.getFeedlot().then(function(persons) {
        vm.persons = persons.data;
        }, function (error) {
            $scope.status = 'Unable to load customer data: ' + error.message;
        })
});
