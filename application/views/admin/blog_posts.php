<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <div class="white-box ">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="box-title">Blog Admin</h4>
                </div>
                <div class="col-sm-6 text-right">
                  <a href="/admin/admin_panel_blog_post_create" class="btn btn-success"> Create new post</a>
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
                      <?php foreach($posts as $row) { ?>
                        <tr>
                          <td>
                            <a href="/admin/admin_panel_blog_post_edit/<?php echo $row["id_blog"]; ?>"><?php echo $row["title"]; ?></a>
                          </td>
                          <td>
                            <?php echo $row["creationdate"]; ?>
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
