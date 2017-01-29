var $widgets = angular.module('myapp.widget', []);

$widgets.directive('myCustomer', function() {
  return {
        restrict: 'E',
        templateUrl: 'features/displayfeedlot/displayfeedlot.View.php'
  };
});

$widgets.directive('feedlotId', function() {
    return {
        restrict: 'E',
        templateUrl: 'features/feedlotid/feedlotid.View.php'
    };
});

$widgets.directive('feedlotidSubmenu', function() {
    return {
        restrict: 'E',
        templateUrl: 'features/feedlotidsubmenu/feedlotidsubmenu.View.php'
    };
});


angular.module('showcase.withPromise', ['datatables', 'ngResource']).controller('WithPromiseCtrl', WithPromiseCtrl);

function WithPromiseCtrl(DTOptionsBuilder, DTColumnBuilder, $http, $q) {
    var vm = this;
    vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
        var defer = $q.defer();
        $http.get('http://localhost/API-FARMAPP/api/v1/src/public/api/v1/feedlots.json').then(function(result) {
            defer.resolve(result.data);
        });
        return defer.promise;
    }).withPaginationType('full_numbers');

    vm.dtColumns = [
        DTColumnBuilder.newColumn('feedlot_records.feedlots.lot_id').withTitle('ID'),
        DTColumnBuilder.newColumn('firstName').withTitle('First name'),
        DTColumnBuilder.newColumn('lastName').withTitle('Last name').notVisible()
    ];
}
