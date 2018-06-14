<div class="container-fluid">
  <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-12">
          <div class="white-box">
              <div class="row">
                  <div class="col-md-12">
                    <form method="post">
                      <input type="hidden" name="action" value="submission">


                      <div class="form-group">
                        <strong>Job title</strong>
                        <br>
                        <p class="text-muted"><?php echo $project["title"]; ?></p>
                      </div>

                      <div class="form-group">
                        <strong>Job budget</strong>
                        <br>
                        <p class="text-muted"><?php echo $project["type"]; ?> // $<?php echo number_format($project["amount"],2); ?></p>

                      </div>

                      <div class="form-group">
                        <strong>Job description</strong>
                        <hr>
                          <p><?php echo $project["description"]; ?></p>
                      </div>

                      <hr>

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">Role</span>
                          <input class="form-control" placeholder="Your role" name="role">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input class="form-control" min="0" step="any" placeholder="Amount" type="number" name="submission_amount">
                        </div>
                      </div>

                      <div class="form-group">
                          <textarea class="textarea_editor form-control" rows="15" placeholder="Enter your submission..." name="submission_description"></textarea>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-md-10">
                          <strong>Milestones</strong>
                        </div>
                        <div class="col-md-2 text-right">
                          <a href="#" class="btn btn-info" onclick="add_milestone(); return false;"><i class="fa fa-plus-circle"></i> Add milestone</a>
                        </div>
                      </div>

                      <br/>

                      <div class="row">
                        <div class="col-md-12">
                          <div id="milestones">Nothing yet.</div>
                        </div>
                      </div>

                      <input type="hidden" name="submission_milestones" id="submission_milestones" value="">

                      <hr>

                      <div class="row">
                        <div class="col-md-12 text-right">
                          <?php if($can_apply) { ?>
                          <button type="submit" class="btn btn-success" onclick="build_milestones()"><i class="fa fa-rocket"></i> Send submission now!</button>
                          <?php } else { ?>
                          <a href="/jobs" class="btn btn-default"><i class="fa fa-smile-o"></i> You have already applied to this project</a>
                          <?php } ?>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
var milestones = [];

var build_milestones = function() {
  $('#submission_milestones').val(JSON.stringify(milestones));
}

var redraw_milestones = function() {
  var HTML = '';
  for ( var index in milestones ) {
    var milestone = milestones[index];
    var ROW = '<div class="row"> \
      <div class="col-md-8"> \
        <input type="text" class="form-control" placeholder="Milestone description" name="milestone_'+index+'" id="milestone_'+index+'" value="'+milestone.milestone+'" onchange="update_milestone(\''+index+'\')"> \
      </div> \
      <div class="col-md-2"> \
      <input type="text" class="form-control" placeholder="Time/Duration" name="milestone_time_'+index+'" id="milestone_time_'+index+'" value="'+milestone.time+'" onchange="update_milestone(\''+index+'\')"> \
      </div> \
      <div class="col-md-2 text-right"> \
        <button class="btn btn-warning" onclick="remove_milestone(\''+index+'\')"><i class="fa fa-remove"></i> Remove</button> \
      </div> \
    </div><br/>';

    HTML += ROW;
  }
  $('#milestones').html(HTML);
}

var remove_milestone = function(index) {
  milestones.splice(index,1);
  redraw_milestones();
}

var update_milestone = function(index) {
  milestones[index].milestone = $('#milestone_'+index).val();
  milestones[index].time = $('#milestone_time_'+index).val();
}

var add_milestone = function() {
  milestones.push({
    'progress':'0',
    'milestone':'',
    'time': ''
  });
  redraw_milestones();
}
</script>
