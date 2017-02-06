var MyappFactory = angular.module('myapp.factory', []);

MyappFactory.factory('dataFactory', ['$http', function ($http) {
    var dataFactory = {};
    var urlBase = 'http://localhost/API-FARMAPP/api/v1/src/public/api/v1';

    dataFactory.getFeedlot = function () {
        return $http.get(urlBase + '/feedlots.json');
    };

    dataFactory.getFeedlotId = function (lot_id) {
        // console.log(lot_id+ 'HEY YES THIS IS WORKING');
        // return $http.get(urlBase + '/feedlots/'+ lot_id + '.json');
        return $http.get(urlBase + '/feedlots.json');
        // return "$http.get(urlBase + '/feedlots/'+ lot_id + '.json')";
    };

    return dataFactory;
}]);
