<div ng-controller='displayCtrl'>
  <form novalidate class="form-group">
    Tag Number:<br>
    <input name="tagId" type="text" ng-model="user.tagId" placeholder="12345678"><br>
    Breed:<br>
    <input name="breed_name" type="text" ng-model="user.breed_name" placeholder="LMX">
    <br>
    Date of Birth:<br>
    <input name="dob" type="date" class="validate" ng-model="user.dob" placeholder="2015-12-12">
    <br>
    Sex:<br>
    <input name="sex" type="text" ng-model="user.sex" placeholder="bull">
    <br>
    Notes:<br>
    <input name="notes" type="text" ng-model="user.notes" placeholder="Animal Notes">
    <br><br>
    <!-- <button ng-click="reset()">RESET</button> -->
    <input type="button" class="btn btn-default" value="submit" ng-click="insertdata()"/><br />
  </form>

  <p>form = {{ user.tagId }}</p>
  <p> {{user.firstName}}</p>
</div>
