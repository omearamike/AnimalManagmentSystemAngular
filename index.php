<!DOCTYPE html>
<html>
<head>
  <title>Farm App</title>

          <!-- Libs -->
          <script type="text/javascript" src="scripts/vendors/angular.min.js"></script>
          <script type="text/javascript" src="scripts/vendors/angular-route.min.js"></script>
          <script type="text/javascript" src="scripts/vendors/angular-animate.min.js" ></script>
          <script type="text/javascript" src="scripts/app.js"></script>
          <script type="text/javascript" src="scripts/vendors/jquery.js"></script>
          <script type="text/javascript" src="scripts/vendors/displayjq.js"></script>
          <script type="text/javascript" src="scripts/vendors/toaster.js"></script>
          <script type="text/javascript" src="directives/widget.Directive.js"></script>
          <script type="text/javascript" src="directives/draggable.Directive.js"></script>
          <script type="text/javascript" src="directives/tabs.Directive.js"></script>
          <script type="text/javascript" src="services/feedlot.Factory.js"></script>


          <script type="text/javascript" src="features/displayfeedlot/displayfeedlot.Controller.js"></script>
          <!-- Bootstrap -->
          <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
          <link href="css/bootstrap.min.css" rel="stylesheet">
          <link href="css/custom.css" rel="stylesheet">
          <link href="css/toaster.css" rel="stylesheet">
          <link rel="stylesheet" href="css/materialize.min.css">
          <script type="text/javascript" src="scripts/vendors/materialize.min.js"></script>
          <link rel="stylesheet" href="css/style.css">
</head>

    <body>
    <div class="side-menu">
        <?php include("include/header.php"); ?>
    </div>
    <div class="dashboard">
        <div class="mainBody" ng-app="myapp">
            <div data-ng-view=""></div>
        </div>
    </div>
        <!-- <toaster-container toaster-options="{'time-out': 3000}"></toaster-container> -->
    </body>
    <?php include("include/footer.php"); ?>
