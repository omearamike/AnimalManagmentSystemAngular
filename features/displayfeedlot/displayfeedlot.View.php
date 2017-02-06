<main>
  <section>
    <div class="rad-body-wrapper">
      <div class="container-fluid">
        <div class="row">
            <div class="row">
              <div class="col-md-12">
            	<div class="panel panel-default">
            	  <div class="panel-heading">
            		<h3 class="panel-title">Feedlot Dashboard</h3>
            	  </div>
            	  <div class="panel-body">
            <div ng-controller='feedlotController' ng-init="getFeedlot()">
                <div ng-repeat="record in feedlots.feedlot_records.feedlots">


            <!-- Start -->

          <div class="col-lg-4 col-md-12 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h1 class="panel-title"><b>{{record.record_number}}.</b> Lot: {{record.name_feedlot}}</h1>
              </div>
              <div class="panel-body">
                  <div>
                      <div class="btng_feedlot">


                          <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn del_btn" ng-click="addWeight()"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                          <!-- <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn" ng-click="addWeight()"><i class="material-icons left"></i>Add Weight</a> -->
                          <a id="#btn-create-feedlot" class="waves-effect waves-light btn margin-bottom-1em fl_btn" ng-click="addAnimalFeedlot()"><i class="fa fa-user-plus" aria-hidden="true"></i></i></a>
                          <!-- <a href="feedlot/view" class="waves-effect waves-light btn margin-bottom-1em fl_btn"><i class="material-icons left"></i>View Feedlot</a> -->

                          <a href="#!/herdnumber/farm/feedlot/{{ record.lot_id }}" class="waves-effect waves-light btn margin-bottom-1em fl_btn"><i class="fa fa-binoculars" aria-hidden="true"></i></a>

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
            </div>

</div>
</div>




          <!-- End -->








          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Line Chart</h3>
              </div>
              <div class="panel-body">
                <div id="lineChart" class="rad-chart"></div>
              </div>

            </div>
          </div>
          <!-- here-->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Donut Chart</h3>
              </div>
              <div class="panel-body">
                <div id="donutChart" class="rad-chart"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Bar Chart</h3>
              </div>
              <div class="panel-body">
                  <p> YESII</p>
                <div id="barChart" class="rad-chart"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
