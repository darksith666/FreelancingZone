<div class="container-fluid">
  <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-12">
          <div class="white-box">
              <div class="row">
                  <div class="col-md-12">
                    <ul class="nav customtab nav-tabs" role="tablist">
                        <li role="presentation" class="<?php if (empty($show_submissions)) { echo ' active '; } ?>"><a href="#edit" aria-controls="edit" role="tab" data-toggle="tab" aria-expanded="true"><span class="hidden-xs">Edit job</span></a></li>
                        <li role="presentation" class="<?php if (!empty($show_submissions)) { echo ' active '; } ?>"><a href="#submissions" aria-controls="submissions" role="tab" data-toggle="tab" aria-expanded="false"><span class="hidden-xs">Submissions</span></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade <?php if (empty($show_submissions)) { echo ' active in '; } ?>" id="edit">
                            <div class="col-md-12">
                              <form method="post"  enctype="multipart/form-data">
                                <input type="hidden" name="action" value="edit">

                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon">Title</span>
                                    <input <?php if ($project["status"] != "NEW") { echo ' readonly '; } ?> class="form-control" placeholder="Title" name="title" value="<?php echo $project["title"]; ?>">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon">Category</span>
                                    <select <?php if ($project["status"] != "NEW") { echo ' disabled="disabled" '; } ?>  class="form-control select2" name="id_category">
                                      <?php foreach($categories as $category_group) { ?>
                                        <optgroup label="<?php echo $category_group["group_label"]; ?>">
                                        <?php foreach($category_group["categories"] as $category) { ?>
                                          <option  <?php if ($project["id_category"]==$category["id_category"]) { echo ' SELECTED '; } ?> value="<?php echo $category["id_category"]; ?>"><?php echo $category["category_label"]; ?></option>
                                        <?php } ?>
                                      </optgroup>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon">Visibility</span>
                                    <select  <?php if ($project["status"] != "NEW") { echo ' disabled="disabled" '; } ?> class="form-control" name="visibility">
                                      <option value="PUBLIC" <?php if ($project["visibility"]=="PUBLIC") { echo ' SELECTED '; } ?>>Public, everyone can see the job</option>
                                      <option value="HIDDEN" <?php if ($project["visibility"]=="HIDDEN") { echo ' SELECTED '; } ?>>Hidden, this job is not available on the site</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="input-group m-b-30">
                                    <?php if ($project["status"] != "NEW") { ?>
                                      <strong>Skills</strong><br/><br/>
                                      <?php

                                        $skills = explode(",",$project["skills"]);
                                        foreach($skills as $skill) {
                                          echo '<a href="#" class="btn btn-info btn-rounded">'.$skill.'</a> &nbsp;';
                                        }

                                      ?>
                                    <?php } else { ?>
                                        <input  <?php if ($project["status"] != "NEW") { echo ' readonly '; } ?> type="text" name="skills"  value="<?php echo $project["skills"]; ?>" data-role="tagsinput" placeholder="add skills" style="display: none;">
                                        <span class="input-group-addon">Skills</span>
                                    <?php } ?>

                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon">Type</span>
                                    <select  <?php if ($project["status"] != "NEW") { echo ' disabled="disabled" '; } ?> class="form-control" name="type">
                                      <option value="FIXED" <?php if ($project["type"]=="FIXED") { echo ' SELECTED '; } ?>>Fixed</option>
                                      <option value="HOURLY" <?php if ($project["type"]=="HOURLY") { echo ' SELECTED '; } ?>>Hourly</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input <?php if ($project["status"] != "NEW") { echo ' readonly '; } ?>  class="form-control"  value="<?php echo $project["amount"]; ?>" min="0" step="any" placeholder="Amount" type="number" name="amount">
                                  </div>
                                </div>

                                <div class="form-group">
                                    <?php if ($project["status"] != "NEW") { ?>
                                      <?php echo $project["description"]; ?>
                                    <?php } else { ?>
                                      <textarea  class="textarea_editor form-control" rows="15" placeholder="Enter description..." name="description"><?php echo $project["description"]; ?></textarea>
                                    <?php } ?>
                                </div>

                                <hr/>

                                <?php if ($project["status"] == "NEW") { ?>
                                  <div class="form-group">
                                    <h4><i class="ti-link"></i> Attachment (max size 2mb)</h4>
                                    <input type="file" id="input-file-now" class="dropify" name="file"/>
                                  </div>
                                <?php } ?>

                                <div class="form-group">
                                  <strong>Files</strong>
                                  <br>
                                  <p class="text-muted">
                                    <?php if (count($project_files) > 0) { ?>
                                      <ul>
                                        <?php
                                        foreach($project_files as $file) {
                                          echo '<li/> <a href="/projects/download_file/'.$file["filepath"].'">'.$file["filename"].'</a> ';
                                          if ($project["status"] == "NEW") {
                                            echo '<a href="/projects/delete_file/'.$project["id_project"].'/'.$file["filepath"].'" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>';
                                          }
                                          echo '<br/><br/>';
                                        }
                                        ?>
                                      </ul>
                                    <?php } else { ?>
                                      No file yet.
                                    <?php }  ?>
                                  </p>

                                </div>

                                <hr>
                                <div class="row">
                                  <div class="col-md-12 text-right">
                                    <a class="btn btn-default" href="/projects/myprojects "><i class="fa fa-times"></i> Cancel</a>
                                    <?php if ($project["status"] == "NEW") { ?>
                                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                    <?php } ?>
                                  </div>
                                </div>
                              </form>                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade <?php if (!empty($show_submissions)) { echo ' active in '; } ?>" id="submissions">
                            <div class="col-md-12">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Status</th>
                                          <th>Date</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php if (count($submissions) == 0) { ?>
                                      <tr>
                                        <td colspan="3">Empty</td>
                                      </tr>
                                    <?php } ?>
                                    <?php foreach($submissions as $submission) { ?>
                                      <tr>
                                        <td><a href="/projects/submission/<?php echo $submission["id_job"]; ?>" class="text-link"><?php echo $submission["fullname"]; ?></a></td>
                                        <td>
                                          <?php
                                          if ($submission["status"] == "NEW") {
                                            echo 'Unread';
                                          }
                                          if ($submission["status"] == "READ") {
                                            echo 'Read';
                                          }
                                          if ($submission["status"] == "ACCEPTED") {
                                            echo 'Accepted';
                                          }
                                          if ($submission["status"] == "DECLINED") {
                                            echo 'Declined';
                                          }
                                          if ($submission["status"] == "APPROVED") {
                                            echo 'Approved';
                                          }
                                          if ($submission["status"] == "REJECTED") {
                                            echo 'Rejected';
                                          }
                                          ?>
                                        </td>
                                        <td>
                                          <?php echo $submission["creationdate"]; ?>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                              </table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
