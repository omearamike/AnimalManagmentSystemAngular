<!DOCTYPE html>
<html>
<head>
  <title>farm App</title>


          <!-- Libs -->

          <script type="text/javascript" src="scripts/vendors/jquery.js"></script>
          <script type="text/javascript" src="scripts/vendors/jquery.dataTables.js"></script>
          <script type="text/javascript" src="scripts/vendors/angular.js"></script>
          <script type="text/javascript" src="scripts/vendors/angular-datatables.js"></script>
          <script type="text/javascript" src="scripts/vendors/angular-route.js"></script>
          <script type="text/javascript" src="scripts/vendors/angular-resource.js"></script>
          <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
          <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
          <!-- <script type="text/javascript" src="scripts/vendors/angular-animate.js" ></script> -->

          <script type="text/javascript" src="scripts/app.js"></script>

          <script type="text/javascript" src="scripts/vendors/displayjq.js"></script>
          <script type="text/javascript" src="scripts/vendors/toaster.js"></script>


          <script type="text/javascript" src="directives/tabs.Directive.js"></script>
          <script type="text/javascript" src="directives/widget.Directive.js"></script>
          <script type="text/javascript" src="directives/draggable.Directive.js"></script> -->
          <script type="text/javascript" src="services/feedlot.Factory.js"></script>

          <script type="text/javascript" src="features/displayfeedlot/displayfeedlot.Controller.js"></script>
          <script type="text/javascript" src="features/feedlotid/feedlotid.Controller.js"></script>
          <script type="text/javascript" src="features/displayanimals/displayanimals.Controller.js"></script>
          <!-- Bootstrap -->
          <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
          <link href="css/bootstrap.css" rel="stylesheet">
          <link href="css/angular.css" rel="stylesheet">

          <link href="css/custom.css" rel="stylesheet">
          <link href="css/jquery.dataTables.min.css" rel="stylesheet">
          <link href="css/toaster.css" rel="stylesheet">
          <link href="css/widget.css" rel="stylesheet">
          <link rel="stylesheet" href="css/style.css">

          <script>

        </script>

</head>

    <body>
    <div class="side-menu">
        <?php include("include/header.php"); ?>
    </div>
    <div class="dashboard">
        <div class="mainBody" ng-app="myapp">
            <div data-ng-view=""></div>
        </div>
<h1>test</h1>
    </div>
	<h1>skdf</h1>
        <!-- <toaster-container toaster-options="{'time-out': 3000}"></toaster-container> -->
    </body>
    <?php include("include/footer.php"); ?>
