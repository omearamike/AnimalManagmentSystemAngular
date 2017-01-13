
<div ng-controller='viewFeedlotCtrl' ng-init="getSingleFeedlotDetails()">
    <div ng-repeat="attribute in feedlotDetails">
        <div class="feedlotContainer fl_details">
            <div class="feedlotDetails fl_details">
                <h5><b>Feedlot Name:</b> {{ attribute.feedlot_name }} </h5>
                <p><b>Feedlot Name:</b> {{ attribute.custom}} </p>
                <p><b>Feedlot Name:</b> {{ attribute.feedlot_id }} </p>
                <p><b>Feedlot Name:</b> {{ attribute.feedlot_id }} </p>
                <p><b>Feedlot Name:</b> {{ attribute.feedlot_id }} </p>
                <p><b>Feedlot Name:</b> {{ attribute.feedlot_id }} </p>
                <p><b>Feedlot Name:</b> {{ attribute.feedlot_id }} </p>
            </div>
        </div>





<div class="btng_feedlot">
        <!-- modal for creating a new feedlot -->
        <div id="modal-allanimals" class="modal editAnimalPopUp">
            <div class="modal-content">
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

                    <tbody ng-controller='animalCtrl' ng-init="getAllAnimals()">
                        <tr ng-repeat="animal in animalList | filter:searchFilter">
                            <td ng-init="number = counter()">{{number}}</td>
                            <td><a href="#/animal/view/?{{animal.tag_id}}">IE{{ animal.tag_id}}</a></td>
                            <td>{{ animal.breed_name }}</td>
                            <td>
                                <div class="mytooltip">Age: Y{{animal.year}} M{{animal.month}}
                                    <span class="mytooltiptext"> <div class="test">{{animal.dob}}</div> </span>
                                </div>
                            </td>
                            <td>{{ animal.sex_type }}</td>
                            <td>{{ animal.notes }}</td>
                            <td> <a ng-click="moveAnimal(attribute.feedlot_id, animal.tag_id)" class="waves-effect waves-light btn">Quick Add</a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- End of Feedlot Details Loop -->
</div> <!-- End of viewFeedlotCtrl Controller -->

    <div class="fl_details">
            <a ng-controller='animalCtrl' ng-click="displayAllAnimals()" class="waves-effect waves-light btn margin-bottom-1em fl_btn"><i class="material-icons left"></i>Add Animals</a>
            <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn" ng-click="addWeight()"><i class="material-icons left"></i>Add Weight</a>

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

                        <tbody ng-controller='viewFeedlotCtrl' ng-init="getSingleFeedlotAnimals()">
                            <tr ng-repeat="animal in feedlotAnimals | filter:searchFilter">
                                <td ng-init="number = counter()">{{number}}</td>
                                <td><a href="#/animal/view/?{{animal.tag_id}}">IE{{ animal.tag_id}}</a></td>
                                <td>{{ animal.breed_name }}</td>
                                <td>
                                    <div class="mytooltip">Age: Y{{animal.year}} M{{animal.month}}
                                        <span class="mytooltiptext"> <div class="test">{{animal.dob}}</div> </span>
                                    </div>
                                </td>
                                <td>{{ animal.sex_type }}</td>
                                <td>{{ animal.notes }}</td>
                                <td> <a ng-click="moveAnimal(feedlot.feedlot_id, animal.tag_id)" class="waves-effect waves-light btn">Remove Animal</a> </td>
                            </tr>
                        </tbody>
                    </table>
    </div>
