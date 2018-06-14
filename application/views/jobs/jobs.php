<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title">My jobs</h4>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Job</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if ($paging["total"] == 0) { ?>
                        <tr>
                          <td colspan="5">Empty</td>
                        </tr>
                      <?php } ?>
                      <?php foreach($myjobs as $row) { ?>
                        <tr>
                          <td>
                            <a href="/jobs/edit/<?php echo $row["id_job"]; ?>" class="text-link"><?php echo $row["title"]; ?></a>
                          </td>
                          <td>
                            <?php
                            if ($row["status"] == "NEW") {
                              echo 'Unread';
                            }

                            if ($row["status"] == "READ") {
                              echo 'Read';
                            }

                            if ($row["status"] == "DECLINED") {
                              echo 'Declined';
                            }

                            if ($row["status"] == "ACCEPTED") {
                              echo 'Accepted';
                            }
                            if ($row["status"] == "APPROVED") {
                              echo 'Approved';
                            }
                            if ($row["status"] == "REJECTED") {
                              echo 'Rejected';
                            }
                            ?>
                          </td>
                          <td>
                            <?php echo $row["role"]; ?>
                          </td>
                          <td>
                            <?php echo $row["creationdate"]; ?>
                          </td>
                          <td align="right">
                            <?php if ($row["status"] == "NEW" || $row["status"] == "READ") { ?>
                              <a class="btn btn-danger"><i class="fa fa-remove"></i> Remove</a>
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
