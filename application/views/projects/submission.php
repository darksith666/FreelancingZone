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
                          <strong>Submission by</strong>
                          <br>
                          <a href="/freelancers/view/<?php echo $job["id_user"]; ?>"><?php echo $job["fullname"]; ?></a>
                        </div>

                        <div class="form-group">
                          <strong>Status</strong>
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
                          if ($job["status"] == "REJECTED") {
                            echo 'Rejected';
                          }
                          if ($job["status"] == "APPROVED") {
                            echo 'Approved';
                          }
                          ?>
                          </p>
                        </div>

                        <div class="form-group">
                          <strong>Role</strong>
                          <br>
                          <p class="text-muted"><?php echo $job["role"]; ?></p>
                        </div>

                        <div class="form-group">
                          <strong>Submitted on</strong>
                          <br>
                          <p class="text-muted"><?php echo $job["creationdate"]; ?></p>
                        </div>

                        <div class="form-group">
                          <strong>Requested amount</strong>
                          <br>
                          <p class="text-muted">$<?php if (empty($job["submission_amount"])) { $job["submission_amount"] = 0; } echo number_format($job["submission_amount"],2); ?></p>
                        </div>

                        <div class="form-group">
                          <strong>Description</strong>
                          <hr>
                            <p><?php echo $job["submission_description"]; ?></p>
                        </div>

                        <hr>

                        <div class="form-group">
                          <?php
                          $milestones = json_decode($job["submission_milestones"], true);
                          if (empty($milestones)) {
                            echo 'No milestone.';
                          } else {
                            echo '<br/>';
                            foreach($milestones as $milestone) {
                              echo '<div class="row">

                                <div class="col-md-4">
                                <strong>Milestone</strong>
                                <br/>
                                '.$milestone["milestone"].'
                                </div>

                                <div class="col-md-4">
                                <strong>Time/Duration</strong>
                                <br/>
                                  '.$milestone["time"].'
                                </div>

                                <div class="col-md-4">
                                <strong>Task '.$milestone["progress"].'% complete</strong>
                                <br/>
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="'.$milestone["progress"].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$milestone["progress"].'%;"> <span class="sr-only">'.$milestone["progress"].'% Complete</span> </div>
                                  </div>
                                </div>

                              </div><br/>';
                            }
                          }
                          ?>

                        </div>

                        <hr>

                        <div class="row">
                          <div class="col-md-12 text-right">
                            <a class="btn btn-default" href="/projects/edit/<?php echo $project["id_project"]; ?>"><i class="fa fa-arrow-circle-o-left"></i> Return</a>
                            <a href="/contacts/connect/<?php echo $job["id_user"]; ?>"  class="btn btn-info"><i class="icon-bubbles fa-fw"></i> Start conversation</a>
                            <?php if ($job["status"] == "NEW" || $job["status"] == "READ") { ?>
                            <a href="/projects/decline_submission/<?php echo $project["id_project"]; ?>/<?php echo $job["id_job"]; ?>" class="btn btn-warning"><i class="fa fa-thumbs-o-down"></i> Reject submission</a>
                            <a href="/projects/accept_submission/<?php echo $project["id_project"]; ?>/<?php echo $job["id_job"]; ?>" class="btn btn-success"><i class="fa fa-thumbs-o-up"></i> Accept submission</a>
                            <?php } ?>
                            <?php if ($job["status"] == "ACCEPTED") { ?>
                              <a href="/projects/close_job/<?php echo $job["id_job"]; ?>/reject"  class="btn btn-danger"><i class="fa fa-thumbs-o-down"></i> Reject work and close job</a>
                              <a href="/projects/close_job/<?php echo $job["id_job"]; ?>/approve"  class="btn btn-success"><i class="fa fa-thumbs-o-up"></i> Approve work and close job</a>
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
