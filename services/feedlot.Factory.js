angular.module('myapp')
    .factory('dataFactory', ['$http', function($http) {

    var dataFactory = {};

    dataFactory.getFeedlot = function () {
        return $http.get('http://localhost/API-FARMAPP/api/v1/src/public/api/v1/feedlots.json');
    };

    return dataFactory;
}]);
// /api/v1/feedlots.json
