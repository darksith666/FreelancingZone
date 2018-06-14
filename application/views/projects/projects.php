<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">


        <div class="alert alert-info" role="alert">
          We are currently in the launch phase, stick around to see what's new :)
        </div>


        <div class="white-box">
          <form role="search" method="post">
            <input type="hidden" name="action" value="filter">
            <div class="row">
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon-magnifier"></i></span>
                  <input type="text" name="query" placeholder="Search..." class="form-control" value="<?php echo $search_query["query"]; ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">Category</span>
                  <select class="form-control select2" name="id_category">
                    <option value="ALL">All</option>
                    <?php foreach($categories as $category_group) { ?>
                      <optgroup label="<?php echo $category_group["group_label"]; ?>">
                      <?php foreach($category_group["categories"] as $category) { ?>
                        <option <?php if ($search_query["id_category"]==$category["id_category"]) { echo ' SELECTED '; } ?>value="<?php echo $category["id_category"]; ?>"><?php echo $category["category_label"]; ?></option>
                      <?php } ?>
                    </optgroup>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <br/>
            <div class="row">
              <div class="col-md-12">
                <div class="input-group m-b-30">
                  <span class="input-group-addon">Skills</span>
                  <input type="text" name="skills" value="<?php echo $search_query["skills"]; ?>" data-role="tagsinput" placeholder="add skills" style="display: none;">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Filter results</button>
              </div>
            </div>


          </form>
        </div>
        <div class="white-box">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="box-title">Browse jobs</h4>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if ($paging["total"] == 0) { ?>
                        <tr>
                          <td colspan="5">Empty</td>
                        </tr>
                      <?php } ?>
                      <?php foreach($projects as $row) { ?>
                        <tr>
                          <td><a href="/projects/view/<?php echo $row["id_project"]; ?>" class="text-link"><?php echo $row["title"]; ?></a></td>
                          <td>
                            <?php
                            if ($row["status"] == "NEW") {
                              echo 'Pending approval';
                            }
                            if ($row["status"] == "ACTIVE") {
                              echo 'Accepting proposals';
                            }
                            if ($row["status"] == "ASSIGNED") {
                              echo 'Assigned to freelancer';
                            }
                            if ($row["status"] == "CLOSED") {
                              echo 'Closed';
                            }
                            if ($row["status"] == "DISAPPROVED") {
                              echo 'Project not approved';
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
                            $<?php echo number_format($row["amount"],2); ?>
                          </td>
                          <td>
                            <?php echo $row["category_label"]; ?>
                          </td>
                          <td>
                            <?php echo $row["creationdate"]; ?>
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
