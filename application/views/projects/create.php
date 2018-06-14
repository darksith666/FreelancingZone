<div class="container-fluid">
  <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-12">
          <div class="white-box">
              <div class="row">
                  <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data">
                      <input type="hidden" name="action" value="create">

                      <h3 class="box-title">Create new project</h3>
                      <br/>

                      <div class="form-group">
                          <input class="form-control" placeholder="Title" name="title">
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">Category</span>
                          <select class="form-control select2" name="id_category">
                            <?php foreach($categories as $category_group) { ?>
                              <optgroup label="<?php echo $category_group["group_label"]; ?>">
                              <?php foreach($category_group["categories"] as $category) { ?>
                                <option value="<?php echo $category["id_category"]; ?>"><?php echo $category["category_label"]; ?></option>
                              <?php } ?>
                            </optgroup>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group m-b-30">
                          <span class="input-group-addon">Skills</span>
                          <input type="text" name="skills" value="" data-role="tagsinput" placeholder="add skills" style="display: none;">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">Type</span>
                          <select class="form-control" name="type">
                            <option value="FIXED">Fixed</option>
                            <option value="HOURLY">Hourly</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input class="form-control" min="0" step="any" placeholder="Amount" type="number" name="amount">
                        </div>
                      </div>

                      <div class="form-group">
                          <textarea class="textarea_editor form-control" rows="15" placeholder="Enter description..." name="description"></textarea>
                      </div>

                      <div class="form-group">
                        <h4><i class="ti-link"></i> Attachment (max size 2mb)</h4>
                        <input type="file" id="input-file-now" class="dropify" name="file"/>
                      </div>

                      <hr>
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <a class="btn btn-default" href="/projects/myprojects "><i class="fa fa-times"></i> Cancel</a>
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
