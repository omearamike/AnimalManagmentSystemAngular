<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">
	       <div class="panel-heading">
		        <h3 class="panel-title">Animal List</h3>
	        </div>

	        <div class="panel-body">
                <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">

<div ng-controller="AngularWayOneTimeBindingCtrl as showCase">
    <table datatable="ng" dt-options="showCase.dtOptions" class="row-border hover">
        <thead>
        <tr>
            <th>Select</th>
            <th>ID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>ID</th>
            <th>FirstName</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="person in ::showCase.persons.feedlot_records.feedlots">
            <td><input type="checkbox" ng-model="checkboxModel.value1" ng-true-value="'YES'" ng-false-value="'NO'"></td>
            <td>{{ person.lot_id }}</td>
            <td>{{ person.name_feedlot }}</td>
            <td>{{ person.adg_feedlot }}</td>
            <td>{{ person.lot_id }}</td>
            <td>{{ person.name_feedlot }}</td>
        </tr>
        </tbody>
    </table>
</div>

                <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
            </div>

        </div>
    </div>
</div>
