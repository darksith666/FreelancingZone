 <div class="container-fluid">

  <div class="white-box">
    <div class="row">


        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="edit">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
              <div class="profile-widget">
                  <div class="profile-img">
                      <div class="form-group">
                        <h4><i class="fa fa-picture-o"></i> Profile picture (jpg, png, gif, max size 2mb)</h4>
                        <input type="file" id="input-file-now" class="dropify" name="file"/>
                      </div>
                      <p class="m-t-10 m-b-5"><a href="javascript:void(0);" class="profile-text font-22 font-semibold"><?php echo $profile["fullname"]; ?></a></p>
                      <span class="font-16"><?php echo $profile["location"]; ?></span>
                  </div>
                  <div class="profile-info">
                      <div class="col-xs-6 col-md-6 b-r">
                          <h1 class="text-success">647 </h1>
                          <span class="font-16">Positive reviews</span>
                      </div>
                      <div class="col-xs-6 col-md-6">
                          <h1 class="text-danger">98 </h1>
                          <span class="font-16">Negative reviews</span>
                      </div>
                  </div>
                  <hr/>
                  <div class="profile-detail font-15">
                      <textarea class="form-control" rows="10" placeholder="Enter summary..." name="summary" ><?php echo $profile["summary"]; ?></textarea>
                  </div>
                  <div class="profile-btn">
                      <button type="submit" class="btn btn-success btn-outline m-r-0"><i class="fa fa-save"></i> Save my profile</button>
                  </div>
              </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">


                      <?php if ($error) { ?>
                      <div class="alert alert-danger"> <?php echo $error; ?> </div>
                      <?php } ?>
              <div class="row">
                  <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                      <br>
                      <p class="text-muted"><input type="text" placeholder="Full name" class="form-control" name="fullname" value="<?php echo $profile["fullname"]; ?>"></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                      <br>
                      <p class="text-muted"><input type="text" placeholder="Mobile" class="form-control" name="mobile" value="<?php echo $profile["mobile"]; ?>"></p>
                  </div>
                  <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                      <br>
                      <p class="text-muted"><input type="text" placeholder="Display email" class="form-control" name="email" value="<?php echo $profile["email"]; ?>"></p>
                  </div>
                  <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                      <br>
                      <p class="text-muted"><input type="text" placeholder="Location" class="form-control" name="location" value="<?php echo $profile["location"]; ?>"></p>
                  </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Email visibility</span>
                  <select class="form-control" name="email_visibility">
                    <option value="PUBLIC" <?php if ($profile["email_visibility"]=="PUBLIC") { echo ' SELECTED '; } ?>>Public, everyone can see my email address</option>
                    <option value="HIDDEN" <?php if ($profile["email_visibility"]=="HIDDEN") { echo ' SELECTED '; } ?>>Hidden, my email address is not available on the site</option>
                  </select>
                </div>
              </div>

              <hr>

              <textarea class="textarea_editor form-control" rows="15" placeholder="Enter description..." name="description"><?php echo $profile["description"]; ?></textarea>

              <h4 class="font-bold m-t-30">Skill Set</h4>
              <hr>

              <div class="row">
                <div class="col-md-12 text-right">
                  <a href="/profile/add_skill" class="btn btn-success"><i class="fa fa-plus"></i> Add skill</a>
                </div>
              </div><Br/>

              <?php foreach($profile["skills"] as $skill) { ?>
                <div class="row">
                  <div class="col-md-8">
                    <input type="text" placeholder="Skill" class="form-control" name="skill_<?php echo $skill["id_users_skill"]; ?>" value="<?php echo $skill["skill"]; ?>">
                  </div>
                  <div class="col-md-2">
                    <div class="input-group">
                      <span class="input-group-addon">%</span>
                      <input type="number" placeholder="Progress" class="form-control" name="skill_level_<?php echo $skill["id_users_skill"]; ?>" value="<?php echo $skill["level"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-2 text-right">
                    <a href="/profile/delete_skill/<?php echo $skill["id_users_skill"]; ?>" class="btn btn-warning"><i class="fa fa-remove"></i> Delete skill</a>
                  </div>
                </div><BR/>
              <?php } ?>

            </div>
        </div>
        </form>
    </div>
  </div>

</div>
