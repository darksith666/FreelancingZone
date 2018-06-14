<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <div class="white-box ">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="box-title">Browse contacts</h4>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Summary</th>
                            <th>Location</th>
                            <th>Skills</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php if ($paging["total"] == 0) { ?>
                        <tr>
                          <td colspan="5">Empty</td>
                        </tr>
                      <?php } ?>
                      <?php foreach($freelancers as $row) { ?>
                        <tr>
                          <td>
                            <a href="/contacts/talk/<?php echo $row["id_user"]; ?>"><img style="width:32px;" src="/resources/uploads/profile_pictures/<?php echo $row["profile_picture"]; ?>" alt="user" class="img-circle" /> &nbsp; <?php echo $row["fullname"]; ?></a>
                          </td>
                          <td>
                            <?php if ($row["contact_status"] == "REQUEST" || $row["my_contact_status"] == "REQUEST") { echo 'Waiting for connection'; } ?>
                            <?php if ($row["contact_status"] == "BLOCKED" || $row["my_contact_status"] == "BLOCKED") { echo 'Blocked'; } ?>
                            <?php if ($row["contact_status"] == "CONNECTED" && $row["my_contact_status"] == "CONNECTED") { echo 'Connected'; } ?>
                          </td>
                          <td>
                            <?php echo substr($row["summary"], 0, 64); ?>...
                          </td>
                          <td>
                            <?php echo $row["location"]; ?>
                          </td>
                          <td>
                            <p>
                              <?php

                                $skills = explode(",",$row["skills"]);
                                foreach($skills as $skill) {
                                  if (!empty($skill)) {
                                    echo '<a href="#" class="btn btn-info btn-rounded">'.$skill.'</a> &nbsp;';
                                  }
                                }

                              ?>
                            </p>
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
