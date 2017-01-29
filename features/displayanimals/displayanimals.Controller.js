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
// angular.module('showcase.withPromise', ['datatables', 'ngResource']).controller('WithPromiseCtrl', WithPromiseCtrl);
//
$tables.controller('WithPromiseCtrl', function(DTOptionsBuilder, DTColumnBuilder, $http, $q) {
    var vm = this;
    vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
        var defer = $q.defer();
        $http.get('directives/data.json').then(function(data) {
            defer.resolve(data);
        });
        // return defer;
    }).withPaginationType('full_numbers');

    vm.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('test').withTitle('First name'),
        DTColumnBuilder.newColumn('test').withTitle('Last name')
    ];
});





$tables.controller('LoadOptionsWithPromiseCtrl', function($q, $resource) {
    var vm = this;
    vm.dtOptions = $resource('directives/dtOptions.json').get().$promise;

    vm.dtColumns = $resource('directives/dtColumns.json').query().$promise;
        // console.log(vm.dtColumns);
});
