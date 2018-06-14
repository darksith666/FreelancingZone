<div class="container-fluid">
  <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-12">
          <div class="white-box">
              <div class="row">
                  <div class="col-md-12">
                    <form method="post">
                      <input type="hidden" name="action" value="edit">


                      <div class="form-group">
                        <strong>Title</strong>
                        <br>
                        <p class="text-muted"><?php echo $project["title"]; ?></p>
                      </div>

                      <div class="form-group">
                        <strong>Created on</strong>
                        <br>
                        <p class="text-muted"><?php echo $project["creationdate"]; ?></p>
                      </div>

                      <div class="form-group">
                        <strong>Category</strong>
                        <br>
                        <p class="text-muted"><?php echo $project["group_label"]; ?> // <?php echo $project["category_label"]; ?></p>

                      </div>

                      <?php if (!empty($project["skills"])) { ?>
                      <div class="form-group">
                        <strong>Skills</strong>
                        <br>
                        <br>
                        <p>
                          <?php

                            $skills = explode(",",$project["skills"]);
                            foreach($skills as $skill) {
                              echo '<a href="#" class="btn btn-info btn-rounded">'.$skill.'</a> &nbsp;';
                            }

                          ?>
                        </p>
                      </div>
                    <?php } ?>

                      <div class="form-group">
                        <strong>Budget</strong>
                        <br>
                        <p class="text-muted"><?php echo $project["type"]; ?> // $<?php echo number_format($project["amount"],2); ?></p>

                      </div>

                      <div class="form-group">
                        <strong>Description</strong>
                        <hr>
                          <p><?php echo $project["description"]; ?></p>
                      </div>

                      <div class="form-group">
                        <strong>Files</strong>
                        <br>
                        <p class="text-muted">
                          <?php if (count($project_files) > 0) { ?>
                            <ul>
                              <?php
                              foreach($project_files as $file) {
                                echo '<li/> <a href="/projects/download_file/'.$file["filepath"].'">'.$file["filename"].'</a><br/><br/>';
                              }
                              ?>
                            </ul>
                          <?php } else { ?>
                            No file yet.
                          <?php }  ?>
                        </p>

                      </div>

                      <hr>

                      <div class="form-group">
                        <strong>Submissions</strong>
                        <br>
                        <p class="text-muted">
                          <?php if (count($project_submissions) > 0) { ?>
                            <ul>
                              <?php
                              foreach($project_submissions as $submission) {
                                echo '<li/> '.$submission["fullname"].' ( '.$submission["creationdate"]. ' ) ';
                              }
                              ?>
                            </ul>
                          <?php } else { ?>
                            No submission yet.
                          <?php }  ?>
                        </p>

                      </div>

                      <hr>


                      <div class="row">
                        <div class="col-md-12 text-right">
                          <?php if($can_apply) { ?>
                          <a href="/projects/apply/<?php echo $project["id_project"]; ?>" class="btn btn-primary"><i class="fa fa-rocket"></i> Apply for this job</a>
                          <?php } else { ?>
                          <a href="/jobs" class="btn btn-default"><i class="fa fa-smile-o"></i> You have already applied to this job</a>
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
