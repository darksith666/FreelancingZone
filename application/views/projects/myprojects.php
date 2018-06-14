<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title">Posted jobs</h4>
                </div>
                <div class="col-sm-6 text-right">
                  <a href="/projects/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create new job</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Submissions</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if ($paging["total"] == 0) { ?>
                        <tr>
                          <td colspan="6">Empty</td>
                        </tr>
                      <?php } ?>
                      <?php foreach($myprojects as $row) { ?>
                        <tr>
                          <td>
                            <a href="<?php
                            if ($row["status"] == "CLOSED") {
                              echo '/projects/edit/'.$row["id_project"].'';
                            } elseif ($row["status"] == "ASSIGNED") {
                              echo '/projects/submission/'.$row["id_job_assigned"].'';
                            } else {
                              echo '/projects/edit/'.$row["id_project"].'';
                            }
                            ?>" class="text-link"><?php echo $row["title"]; ?></a>
                          </td>
                          <td>
                            <?php
                            if ($row["status"] == "NEW") {
                              echo 'Pending approval';
                            }
                            if ($row["status"] == "ACTIVE") {
                              echo 'Accepting proposals';
                            }
                            if ($row["status"] == "DISAPPROVED") {
                              echo 'Project not approved';
                            }
                            if ($row["status"] == "ASSIGNED") {
                              echo 'Assigned to freelancer';
                            }
                            if ($row["status"] == "CLOSED") {
                              echo 'Closed';
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            if ($row["type"] == "FIXED") {
                              echo 'Fixed budget';
                            }
                            if ($row["type"] == "HOURLY") {
                              echo 'Hourly';
                            }
                            ?>
                          </td>
                          <td>
                            <?php echo $row["category_label"]; ?>
                          </td>
                          <td>
                            <a href="/projects/edit/<?php echo $row["id_project"]; ?>?show_submissions=yes" class="btn <?php if ($row["nb_submissions"] >= 1) { echo 'btn-success'; } else { echo 'btn-default'; } ?> btn-rounded"><?php echo $row["nb_submissions"]; ?></a>
                          </td>
                          <td align="right">
                            <?php if ($row["status"] == "NEW") { ?>
                              <a href="/projects/delete/<?php echo $row["id_project"]; ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Delete</a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php display_paging($paging); ?>
        </div>
      </div>
  </div>
</div>
