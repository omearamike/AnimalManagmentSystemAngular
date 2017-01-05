<!DOCTYPE html>
<html>
<head>
  <title>Farm App</title>

          <!-- Libs -->
          <script type="text/javascript" src="js/scripts/angular.min.js"></script>
          <script type="text/javascript" src="js/scripts/angular-route.min.js"></script>
          <script type="text/javascript" src="js/scripts/angular-animate.min.js" ></script>
          <script type="text/javascript" src="js/scripts/jquery.js"></script>
          <script type="text/javascript" src="js/jquery/displayjq.js"></script>
          <script type="text/javascript" src="js/scripts/toaster.js"></script>
          <script type="text/javascript" src="js/app.js"></script>
          <script type="text/javascript" src="js/controllers.js"></script>
          <script type="text/javascript" src="js/data.js"></script>
          <script type="text/javascript" src="js/directives.js"></script>
          <script type="text/javascript" src="js/authCtrl.js"></script>
          <!-- Bootstrap -->
          <link href="css/bootstrap.min.css" rel="stylesheet">
          <link href="css/custom.css" rel="stylesheet">
          <link href="css/toaster.css" rel="stylesheet">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
          <link href="css/style.css" rel="stylesheet">
</head>


    <?php include("include/header.php"); ?>

        <body class="mainBody" ng-app="myApp">
            <div data-ng-view="" class="slide-animation"></div>
        </body>
        <!-- <toaster-container toaster-options="{'time-out': 3000}"></toaster-container> -->

    <?php include("include/footer.php"); ?>
