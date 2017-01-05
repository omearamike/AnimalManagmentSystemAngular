<!DOCTYPE html>
<html>
<head>
  <title>Farm App</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

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


                <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]><link href= "css/bootstrap-theme.css"rel= "stylesheet" >

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
              </head>


<?php include("include/header.php"); ?>


<!--
  <body ng-cloak="">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="row">
          <div class="navbar-header col-md-8">
            <button type="button" class="navbar-toggle" toggle="collapse" target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" rel="home" title="AngularJS Authentication App">AngularJS Authentication App</a>
          </div>
          <div class="navbar-header col-md-2">
            <a class="navbar-brand" rel="home" title="AngularJS Authentication Tutorial" href="http://www.angularcode.com/user-authentication-using-angularjs-php-mysql">Tutorial</a>
          </div>
           <div class="navbar-header col-md-2">
            <a class="navbar-brand" rel="home" title="Download" href="https://app.box.com/s/1uvn9xo9nbi4xxm9g9dx">Download</a>
          </div>
        </div>
      </div>
    </div>
    <div >
      <div class="container" style="margin-top:20px;">

        <div data-ng-view="" class="slide-animation"></div>
        <! <div data-ng-view="" id="ng-view" class="slide-animation"></div> -->

      <!-- </div>
    </body> -->
<body class="mainBody" ng-app="myApp">
  <div data-ng-view="" class="slide-animation"></div>
</body>
  <!-- <toaster-container toaster-options="{'time-out': 3000}"></toaster-container> -->

<?php include("include/footer.php"); ?>
