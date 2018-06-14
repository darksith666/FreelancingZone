<div class="container-fluid">
  <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-12">
          <div class="white-box">
              <div class="row">
                  <div class="col-md-12">

                      <form method="post">
                        <input type="hidden" name="action" value="review">

                        <h4 class="box-title">Write review</h4>

                        <hr/>

                        <div class="form-group">
                          <strong>Job posted by</strong>
                          <br>
                          <a href="/freelancers/view/<?php echo $job["id_user"]; ?>"><?php echo $project["fullname"]; ?></a>
                        </div>

                        <div class="form-group">
                          <strong>Job status</strong>
                          <br>
                          <p class="text-muted">
                          <?php
                          if ($job["status"] == "NEW") {
                            echo 'Unread';
                          }

                          if ($job["status"] == "READ") {
                            echo 'Read';
                          }

                          if ($job["status"] == "DECLINED") {
                            echo 'Declined';
                          }

                          if ($job["status"] == "ACCEPTED") {
                            echo 'Accepted';
                          }

                          if ($job["status"] == "APPROVED") {
                            echo 'Approved';
                          }

                          if ($job["status"] == "REJECTED") {
                            echo 'Rejected';
                          }
                          ?>
                          </p>
                        </div>
                        <hr>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon">Review</span>
                            <select class="form-control" name="review_type" id="review_type" onchange="update_review_type();">
                              <option value="POSITIVE" <?php if ($review_type == "positive") { echo ' SELECTED '; } ?>>Positive</option>
                              <option value="NEGATIVE" <?php if ($review_type == "negative") { echo ' SELECTED '; } ?>>Negative</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group">
                            <textarea class="form-control" rows="15" placeholder="Enter your review..." name="review_review"></textarea>
                        </div>

                        <hr>

                        <div class="row">
                          <div class="col-md-12 text-right">
                            <a class="btn btn-default" href="/jobs/view/<?php echo $job["id_job"]; ?>"><i class="fa fa-arrow-circle-o-left"></i> Return</a>
                            <button type="submit" class="btn" id="save_button"><i class="fa fa-save"></i> Post review</a>
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
var update_review_type = function() {
  var review_type = $('#review_type').val();
  if (review_type == "NEGATIVE") {
    $('#save_button').removeClass("btn-success");
    $('#save_button').addClass("btn-danger");
  }

  if (review_type == "POSITIVE") {
    $('#save_button').removeClass("btn-danger");
    $('#save_button').addClass("btn-success");
  }
}
update_review_type();
</script>
