<div ng-controller="displayCtrl">

  <!-- modal for for creating new product -->
  <div id="modal-animal-form" class="modal editAnimalPopUp">
      <div class="modal-content">
          <h4 id="modal-animal-title">Create New Animal</h4>
          <div class="row">
              <div class="input-field col s12">
                  <input ng-model="tag_id" type="text"/>
                  <label for="tag_id" class="activeLabel" >Tag ID</label>
              </div>

              <div class="input-field col s12">
                  <input ng-model="breed_name" type="text" class="validate" id="form-name"/>
                  <label for="breed_name" class="activeLabel">Breed Name</label>
              </div>

              <div class="input-field col s12">
                  <input ng-model="sex_type" type="text" class="validate" id="form-name"/>
                  <label for="sex_type" class="activeLabel">Sex Type</label>
              </div>

              <div class="input-field col s12">
                  <input ng-model="dob" type="date" class="validate" id="form-name"/>
                  <label for="dob" class="activeLabel">Date of Birth</label>
              </div>

              <div class="input-field col s12">
                  <textarea ng-model="notes" type="text" class="validate materialize-textarea"></textarea>
                  <label for="notes" class="activeLabel">Notes</label>
              </div>

              <div class="input-field col s12">
                  <a id="btn-create-animal" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createAnimal()"><i class="material-icons left">add</i>Create</a>

                  <a id="btn-update-animal" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateAnimal()"><i class="material-icons left">edit</i>Save Changes</a>

                  <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
              </div>
          </div>
      </div>
  </div>

<!-- used for searching the current list -->
<input type="text" ng-model="nameFilter" class="form-control" placeholder="Search animals by Tag ID..." />

<!-- table that shows product record list -->
<table class="bordered">
    <thead>
        <tr>
            <th class="text-align-left">No</th>
            <th class="text-align-left">Tag ID</th>
            <th class="width-align-left">Breed</th>
            <th class="width-30-pct">DOB (Month Days DOB)</th>
            <th class="text-align-left">Sex</th>
            <th class="text-align-left">Notes</th>
        </tr>
    </thead>

    <tbody ng-init="getAll()">
        <tr ng-repeat="animal in animalList | filter:searchFilter">
            <td ng-init="number = counter()">{{number}}</td>
            <td><a href="/animaldetails/?{{animal.tag_id}}">IE{{ animal.tag_id}}</a></td>
            <td>{{ animal.breed_name }}</td>
            <!-- <td title="{{ animal.dob }}"> Age: Y{{animal.year}} M{{animal.month}} </td> -->
            <td>
            <div class="mytooltip">Age: Y{{animal.year}} M{{animal.month}}
              <span class="mytooltiptext"><div class="test">{{animal.dob}}</div></span>
            </div>
            </td>
            <!-- <td> Age: {{animal.year}} Dob: {{ animal.dob }}
             </td> -->
            <td>{{ animal.sex_type }}</td>
            <td>{{ animal.notes }}</td>
            <td>
              <a ng-click="readOne(animal.tag_id)" class="waves-effect waves-light btn">Quick Edit</a>
              <!-- <a ng-click="deleteProduct(animal.tag_id)" class="waves-effect waves-light btn">Delete</a> -->
            </td>
        </tr>
    </tbody>
</table>




</div>
