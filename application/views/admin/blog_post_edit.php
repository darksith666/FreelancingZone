<div class="container-fluid">
  <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-12">
          <div class="white-box">
              <div class="row">
                  <div class="col-md-12">

                      <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="edit">


                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon">Title</span>
                            <input class="form-control" placeholder="Title" name="title" value="<?php echo $post["title"]; ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon">Author</span>
                            <input class="form-control" placeholder="Author" name="author" value="<?php echo $post["author"]; ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon">Status</span>
                            <select class="form-control" name="status">
                              <option value="PUBLIC" <?php if ($post["status"]=="PUBLIC") { echo ' SELECTED '; } ?>>Public</option>
                              <option value="HIDDEN" <?php if ($post["status"]=="HIDDEN") { echo ' SELECTED '; } ?>>Hidden</option>
                            </select>
                          </div>
                        </div>

                        <?php if (!empty($post["top_image"])) { ?>
                          <div class="text-center" align="center">
                            <img src="/resources/uploads/blog_files/<?php echo $post["top_image"]; ?>" style="width:50%">
                          </div><br/>
                        <?php } ?>

                        <div class="form-group">
                          <div class="input-group">
                            <span class="input-group-addon">Top image</span>
                            <input class="form-control" placeholder="Top image" name="top_image" value="<?php echo $post["top_image"]; ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <h4><i class="ti-link"></i> Attachment (max size 2mb)</h4>
                          <input type="file" id="input-file-now" class="dropify" name="file"/>
                        </div>

                        <div class="form-group">
                            <textarea class="textarea_editor form-control" rows="15" placeholder="Enter your post..." name="body"><?php echo $post["body"]; ?></textarea>
                        </div>


                        <hr>

                        <div class="row">
                          <div class="col-md-12 text-right">
                            <a href="/admin/admin_panel_blog_posts" class="btn btn-default"> Return</a>
                            <a href="/admin/admin_panel_blog_post_delete/<?php echo $post["id_blog"]; ?>" class="btn btn-danger"> Delete</a>
                            <button type="submit" class="btn btn-success"> Save</button>
                          </div>
                        </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
