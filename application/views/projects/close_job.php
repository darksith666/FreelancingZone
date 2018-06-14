<div class="container-fluid">
  <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-12">
          <div class="white-box">
              <div class="row">
                  <div class="col-md-12">
                    <form method="post">
                      <input type="hidden" name="action" value="close_job">

                      <h4 class="box-title">
                        <?php
                        if ($status == "reject") { echo '<span class="text-danger">Reject work '; }
                        if ($status == "approve") { echo '<span class="text-success">Approve work '; }
                        ?>
                        and close job</span></h4>

                        <hr/>

                      <div class="form-group">
                        <strong>Job title</strong>
                        <br>
                        <p class="text-muted"><?php echo $project["title"]; ?></p>
                      </div>
                      <div class="form-group">
                        <strong>Submission by</strong>
                        <br>
                        <a href="/freelancers/view/<?php echo $job["id_user"]; ?>"><?php echo $job["fullname"]; ?></a>
                      </div>
                      <hr>

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">Review</span>
                          <select class="form-control" name="review_type">
                            <option value="POSITIVE" <?php if ($status == "approve") { echo ' SELECTED '; } ?>>Positive</option>
                            <option value="NEGATIVE" <?php if ($status == "reject") { echo ' SELECTED '; } ?>>Negative</option>
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                          <textarea class="form-control" rows="15" placeholder="Enter your review..." name="review_review"></textarea>
                      </div>


                      <div class="row">
                        <div class="col-md-12 text-right">
                          <a href="/projects/submission/<?php echo $job["id_job"]; ?>" class="btn btn-default"> Return</a>
                          <?php
                          if ($status == "reject") { echo '<button type="submit" class="btn btn-danger"><i class="fa fa-thumbs-o-down"></i> Reject work and close job</button> '; }
                          if ($status == "approve") { echo '<button type="submit" class="btn btn-success"><i class="fa fa-thumbs-o-up"></i> Approve work and close job</button>'; }
                          ?>

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
