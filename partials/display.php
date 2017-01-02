<div ng-controller="displayCtrl">

<!-- used for searching the current list -->
<input type="text" ng-model="nameFilter" class="form-control" placeholder="Search animals by Tag ID..." />

<!-- table that shows product record list -->
<table class="hoverable bordered">
    <thead>
        <tr>
            <th class="text-align-left">No</th>
            <th class="text-align-left">Tag ID</th>
            <th class="width-align-left">Breed</th>
            <th class="width-30-pct">DOB (Month Days DOB)</th>
            <th class="text-align-left">Sex</th>
            <th class="text-align-left">Notes</th>
        </tr>
    </thead>

    <tbody ng-init="getAll()">
        <tr ng-repeat="animal in animalList | filter:searchFilter">
            <!-- <td>{{ d }}</td> -->
            <td ng-init="number = counter()">{{number}}</td>
            <!-- <td {{$index + 1}}</td> -->
            <td>IE{{ animal.tag_id}}</td>
            <td>{{ animal.breed_name }}</td>
            <td>{{ animal.dob }}</td>
            <!-- <td>{{(animal.year * )}} {{animal.days}}  Year: {{(d.year) }}</br> {{ d.dob }}</td> -->
            <td>{{ animal.sex_name }}</td>
            <td>{{ animal.notes }}</td>
            <td>
              <a ng-click="readOne(animal.tag_id)" class="waves-effect waves-light btn">Edit</a>
              <a ng-click="deleteProduct(animal.tag_id)" class="waves-effect waves-light btn">Delete</a>
            </td>
        </tr>
    </tbody>
</table>




</div>
