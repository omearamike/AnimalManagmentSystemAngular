<div class="container">
    <div ng-tabs class="tabbable submenu-nav">

        <ul class="nav nav-tabs">
            <li ng-tab-head>
                <a href="#" ng-click="$event.preventDefault()">Feedlot Dashboard</a>
            </li>
            <li ng-tab-head>
                <a href="#" ng-click="$event.preventDefault()">Move Animals</a>
            </li>
            <li ng-tab-head>
                <a href="#" ng-click="$event.preventDefault()">Add Feed</a>
            </li>
            <li ng-tab-head="active">
                <a href="#" ng-click="$event.preventDefault()">Add Weights</a>
            </li>
            <li ng-tab-head>
                <a href="#" ng-click="$event.preventDefault()">Tab 5</a>
            </li>
        </ul>

        <div class="tab-content widget-design ">
        <!-- <div class="tab-content" style="overflow: hidden"> -->
        	<div ng-tab-body class="tab-pane">
        		<feedlot-id></feedlot-id>
        	</div>
        	<div ng-tab-body class="tab-pane">
        		<!-- <my-customer></my-customer> -->
        	</div>
        	<div ng-tab-body class="tab-pane">
        		<display-animals></display-animals>
        	</div>
        	<div ng-tab-body class="tab-pane">
        		<h2>TAB 4</h2>
        	</div>
        	<div ng-tab-body class="tab-pane">
        		<h2>TAB 5</h2>
        	</div>
        </div>
        </div>
        </div>
