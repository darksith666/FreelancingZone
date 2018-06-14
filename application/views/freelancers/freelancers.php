<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <div class="white-box">
          <form role="search" method="post">
            <input type="hidden" name="action" value="filter">
            <div class="row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon-magnifier"></i></span>
                  <input type="text" name="query" placeholder="Search..." class="form-control" value="<?php echo $search_query["query"]; ?>">
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
        <div class="white-box ">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="box-title">Browse freelancers</h4>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
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
                            <a href="/freelancers/view/<?php echo $row["id_user"]; ?>"><img style="width:32px;" src="/resources/uploads/profile_pictures/<?php echo $row["profile_picture"]; ?>" alt="user" class="img-circle" /> &nbsp; <?php echo $row["fullname"]; ?></a>
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
