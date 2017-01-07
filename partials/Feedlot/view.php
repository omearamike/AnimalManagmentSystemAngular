<div ng-controller='viewFeedlotCtrl'>

<div ng-init="readOne()">
<div ng-repeat="feedlot in feedlotDetails">
    <div class="feedlotContainer fl_details">
        <div class="feedlotDetails fl_details">
            <h5><b>Feedlot Name:</b> {{ feedlot.feedlot_name }} </h5>
            <p><b>Feedlot Name:</b> {{ feedlot.custom}} </p>
            <p><b>Feedlot Name:</b> {{ feedlot.feedlot_id }} </p>
            <p><b>Feedlot Name:</b> {{ feedlot.feedlot_id }} </p>
            <p><b>Feedlot Name:</b> {{ feedlot.feedlot_id }} </p>
            <p><b>Feedlot Name:</b> {{ feedlot.feedlot_id }} </p>
            <p><b>Feedlot Name:</b> {{ feedlot.feedlot_id }} </p>

            <div class="btng_feedlot">

                <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn" ng-click="addWeight()"><i class="material-icons left"></i>Add Weight</a>
                <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn" ng-click="addAnimalFeedlot()"><i class="material-icons left"></i>Add Animal</a>
                <!-- <a href="feedlot/view" class="waves-effect waves-light btn margin-bottom-1em fl_btn"><i class="material-icons left"></i>View Feedlot</a> -->
                <a href="#/feedlot/view/{{feedlot.lot_id}}" class="waves-effect waves-light btn margin-bottom-1em fl_btn"><i class="material-icons left"></i>View Feedlot</a>
            </div>

        </div>
        <div class="feedlotAnimals fl_details">
            <h4> List of all the animals </h4>
            <h4> List of all the animals </h4>
            <h4> List of all the animals </h4>
            <h4> List of all the animals </h4>
            <h4> List of all the animals </h4>
        </div>
    </div>
</div>
</div>
</div>

</div>
