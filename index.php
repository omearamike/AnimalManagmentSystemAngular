<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.js"></script> -->
<script src="js/scripts/angular.min.js"></script>
<script src="js/scripts/angular-route.js"></script>
<script src="js/app.js"></script>
<script src="js/services.js"></script>
<script src="js/controllers.js"></script>

<?php include("include/header.php"); ?>

<body ng-app="animalapp">
  <div class="mainBody">
    <ng-view></ng-view>
  </div>
</body>

<?php include("include/footer.php"); ?>
