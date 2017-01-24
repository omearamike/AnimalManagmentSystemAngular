        <div class="feedlotContainer widget-design">
            <div>
                <h5><b>Old Slat Unit </b> {{ attribute.feedlot_name }} </h5>
                <p><b>Lot Number:</b> {{ record.lot_id }}</p>
                <p><b>Name:</b> {{ record.name_feedlot }}</p>
                <p><b>Total Animal Count:</b> {{ record.animal_count }}</p>
                <p><b>Date Created: </b> {{ record.date_created }}</p>
                <p><b>ADG:</b> {{ record.adg_feedlot }}</p>
                <p><b>Avg Weight:</b> {{ record.avg_weight }}</p>
                <p> <b>Min:</b> {{ record.min_weight }} <b>Max:</b>{{ record.max_weight }}</p>
                <p><b>Avg Age:</b> {{ record.avg_age }}</p>
                <p><b>Estimated Value:</b> {{ record.estimated_value | currency:"€"}}</p>
            </div>
            <img class="feedlot-graph" title="Interactive Graph" src="https://designmodo.com/wp-content/uploads/2012/08/preview.png" alt="Interactive Graph" width="400" height=auto>
        </div>




        <div id="modal-allanimals" class="modal editAnimalPopUp">
            <div class="modal-content">
                <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em" ng-click="closeForm()"><i class="material-icons left"></i>Close</a>
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
                            <td> <a ng-click="moveAnimalFeedlot(attribute.feedlot_id, animal.tag_id)" class="waves-effect waves-light btn">Quick Add</a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div> <!-- End of Feedlot Details Loop -->
</div> <!-- End of viewFeedlotCtrl Controller -->

    <div class="fl_details widget-design">
            <!-- <a ng-controller='animalCtrl' ng-click="displayAllAnimals()" class="waves-effect waves-light btn margin-bottom-1em fl_btn"><i class="material-icons left"></i>Add Animals</a>
            <a id="#btn-add-animal-weight" class="waves-effect waves-light btn margin-bottom-1em fl_btn" ng-click="editAnimals()"><i class="material-icons left"></i>Add Weight</a> -->

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
                                <td>{{ animal.tag_id }}</td>
                                <td>{{ animal.notes }}</td>
                                <td> <a ng-click="removeAnimal(animal.tag_id)" class="waves-effect waves-light btn">Remove Animal</a> </td>
                            </tr>
                        </tbody>
                    </table>
    </div>
