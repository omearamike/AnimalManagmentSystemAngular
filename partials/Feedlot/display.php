<div ng-controller='feedlotCtrl'>
    <!-- modal for for creating new product -->
    <div id="modal-feedlot-form" class="modal editAnimalPopUp">
        <div class="modal-content">
            <h4 id="modal-animal-title">Create New Feedlot</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input ng-model="name" type="text"/>
                    <label for="name" class="activeLabel" >New Feedlot Name</label>
                </div>

                <p>form = {{ name }}</p>

                <div class="input-field col s12">
                    <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createFeedlot()"><i class="material-icons left"></i>Create</a>
                    <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left"></i>Close</a>
                </div>
            </div>
        </div>
    </div>

    <a ng-click="showCreateForm()" class="waves-effect waves-light btn">Add New Feedlot</a>

    <div ng-init="getAll()">
        <div class="container_feedlots">
            <div ng-repeat="feedlot in feedlotList">
                <div class="recordof_feedlot">
                    <div class="btng_feedlot">
                        <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em btn_weight" ng-click="addWeight()"><i class="material-icons left"></i>Add Weight</a>
                        <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em btn_addanimal" ng-click="addAnimalFeedlot()"><i class="material-icons left"></i>Add Animal</a>
                    </div>
                    <div class="feedlotstats">
                    <h6><b>Name:</b> {{ feedlot.name_feedlot }} </h6>
                    <p><b>Total Animals:</b> 12</p>
                    <p><b>Feedlot ADG:</b> 1.3kg</p>
                    <p><b>Avg Weight:</b> 1.3kg </p>
                    <p> <b>Min:</b> 445kg <b>Max:</b> 495kg</p>
                    <p><b>Avg Months:</b> 15 Months</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
