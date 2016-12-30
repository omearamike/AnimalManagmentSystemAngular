<div ng-controller="formCtrl">

  <!-- <table class="table table-hover">
  <tr>
  <th>Tag Id</th>
  <th>Breed</th>
  <th>DOB</th>
  <th>Sex</th>
  <th>Notes</th>
  </tr>
  <tr ng-repeat="animal in table">
  <td>{{ animal.tag_id }}</td>
  <td>{{ animal.breed_id }}</td>
  <td>{{ animal.dob }}</td>
  <td>{{ animal.sex }}</td>
  <td>{{ animal.notes }}</td>
  </tr>
  </table>

<a target="_blank" href="functions/download.php">1. Prepare Download</a><br>
<a href="download.php">2. Download File</a>

<script>
  var app = angular.module('animalapp', []);
  app.controller('customersCtrl', function($scope, $http) {
  $http.get("http://localhost:8888/AnimalManagementSystem_v1/functions/getallentriesFunc.php").success(function (response) {
  /*After Successfully fetch the data from JSON file assigning these data to $scope object variable*/
  $scope.table = response;
  });
  });
</script> -->

<!-- used for searching the current list -->
<input type="text" ng-model="search" class="form-control" placeholder="Search product..." />

<!-- table that shows product record list -->
<table class="hoverable bordered">

    <thead>
        <tr>
            <th class="text-align-left">Tag ID</th>
            <th class="width-align-left">Breed</th>
            <th class="width-30-pct">DOB (Month Days DOB)</th>
            <th class="text-align-left">Sex</th>
            <th class="text-align-left">Notes</th>
        </tr>
    </thead>

    <tbody ng-init="getAll()">
        <tr ng-repeat="d in records">
            <!-- <td>{{ d }}</td> -->
            <td>{{ d.tag_id }}</td>
            <td>{{ d.breed_name }}</td>
            <td>{{d.year + d.month}} {{d.days}} </br> {{ d.dob }}</td>
            <td>{{ d.sex_name }}</td>
            <td>{{ d.notes }}</td>
        </tr>
    </tbody>
</table>




</div>
