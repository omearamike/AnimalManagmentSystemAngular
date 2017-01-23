<script type="text/javascript" src="features/displayfeedlot/displayfeedlot.Controller.js"></script>

<div ng-controller='feedlotController' ng-init="getFeedlot()">
    <div ng-repeat="record in feedlots.feedlot_records.feedlots">
        <div class="recordof_feedlot">
            <div class="btng_feedlot">


                                                <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn del_btn" ng-click="addWeight()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                <!-- <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn" ng-click="addWeight()"><i class="material-icons left"></i>Add Weight</a> -->
                <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn" ng-click="addAnimalFeedlot()"><i class="fa fa-user-plus" aria-hidden="true"></i></i></a>
                <!-- <a href="feedlot/view" class="waves-effect waves-light btn margin-bottom-1em fl_btn"><i class="material-icons left"></i>View Feedlot</a> -->

                <a href="#/herdnumber/farm/feedlot/{{ record.lot_id }}" class="waves-effect waves-light btn margin-bottom-1em fl_btn"><i class="fa fa-binoculars" aria-hidden="true"></i></a>

            </div>
            <div class="feedlotstats">
                <!-- <h6><b>Name:</b> {{ record.record_number }} </h6> -->
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
        </div>
    </div>
</div>
