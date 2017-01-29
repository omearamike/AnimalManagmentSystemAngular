<div class="row">
    <div class="col-md-12">
	    <div class="panel panel-default">
	       <div class="panel-heading">
		        <h3 class="panel-title">Animal List</h3>
	        </div>

	        <div class="panel-body">
                <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css">
            <!-- <div ng-controller='feedlotController' ng-init="getFeedlot()">
                <div ng-controller="WithResponsiveCtrl as showCase">
                    <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" class="row-border hover" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Last name</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>
            </div> -->

            <!-- <div ng-controller="WithPromiseCtrl as showCase">
                <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" class="row-border hover"></table>
            </div> -->

            <div ng-controller="LoadOptionsWithPromiseCtrl as showCase">
                <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" class="row-border hover">
                </table>
            </div>


                <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
            </div>

        </div>
    </div>
</div>
