<div ng-controller='feedlotidController'>
    <div nclass="row">
      <div class="col-md-12">
    	<div class="panel panel-default">
    	  <div class="panel-heading">
    		<h3 class="panel-title">Bar Chart</h3>
    	  </div>
    	  <div class="panel-body">

            <div class="feedlotContainer widget-design">
                <div>
                    <h5><b>Old St Unit </b> {{ attribute.feedlot_name }} </h5>
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

      </div>
    </div>
    </div>
    </div>
</div>
