<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <div class="white-box ">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="box-title">New projects Admin</h4>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach($projects as $row) { ?>
                        <tr>
                          <td>
                            <a href="/projects/view/<?php echo $row["id_project"]; ?>"><?php echo $row["title"]; ?></a>
                          </td>
                          <td>
                            <a href="/admin/admin_panel_new_projects_disapprove/<?php echo $row["id_project"]; ?>" class="btn btn-danger">Disapprove</a>
                            <a href="/admin/admin_panel_new_projects_approve/<?php echo $row["id_project"]; ?>"class="btn btn-success">Approve</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
  </div>
</div>
