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

          <script type="text/javascript" src="scripts/controllers/animal.js"></script>
          <script type="text/javascript" src="scripts/controllers/feedlot.js"></script>
          <script type="text/javascript" src="scripts/factory/data.js"></script>
          <script type="text/javascript" src="scripts/directives/directives.js"></script>
          <script type="text/javascript" src="scripts/controllers/authCtrl.js"></script>

          <!-- Bootstrap -->
          <link href="css/bootstrap.min.css" rel="stylesheet">
          <link href="css/custom.css" rel="stylesheet">
          <link href="css/toaster.css" rel="stylesheet">
          <link rel="stylesheet" href="css/materialize.min.css">
          <script type="text/javascript" src="scripts/vendors/materialize.min.js"></script>
          <link rel="stylesheet" href="css/style.css">
</head>


    <?php include("include/header.php"); ?>

        <body class="mainBody" ng-app="myApp">
            <div data-ng-view="" class="slide-animation"></div>
        </body>
        <!-- <toaster-container toaster-options="{'time-out': 3000}"></toaster-container> -->

    <?php include("include/footer.php"); ?>
