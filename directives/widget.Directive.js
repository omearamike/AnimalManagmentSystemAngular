var $widgets = angular.module('myapp.widget', []);

$widgets.directive('displayFeedlot', function() {
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

$widgets.directive('displayAnimals', function() {
    return {
        restrict: 'E',
        templateUrl: 'features/displayanimals/displayanimals.View.php'
    };
});


// angular.module('showcase.withOptions', ['datatables']).controller('WithResponsiveCtrl', WithResponsiveCtrl);

// function WithOptionsCtrl(DTOptionsBuilder, DTColumnDefBuilder) {
//     var vm = this;
//     vm.dtOptions = DTOptionsBuilder.newOptions()
//         .withPaginationType('full_numbers')
//         .withDisplayLength(10)
//         .withDOM('pitrfl');
//     vm.dtColumnDefs = [
//         DTColumnDefBuilder.newColumnDef(0),
//         DTColumnDefBuilder.newColumnDef(1).notVisible(),
//         DTColumnDefBuilder.newColumnDef(2).notSortable()
//     ];
// }


// angular.module('showcase.withResponsive', ['datatables'])
// .controller('WithResponsiveCtrl', WithResponsiveCtrl);
//
// function WithResponsiveCtrl(DTOptionsBuilder, DTColumnBuilder) {
//     var vm = this;
//     vm.dtOptions = DTOptionsBuilder.newOptions()
//         .withPaginationType('full_numbers')
//                 .withDisplayLength(10)
//                 // .withDOM('pitrfl')
//         // Active Responsive plugin
//         .withOption('responsive', true);
//     vm.dtColumns = [
//         DTColumnBuilder.newColumn(0),
//         DTColumnBuilder.newColumn(1),
//         DTColumnBuilder.newColumn(2).withClass('none')
//     ];
// }
