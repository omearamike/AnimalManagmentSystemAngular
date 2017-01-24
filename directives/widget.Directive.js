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
