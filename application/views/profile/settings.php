 <div class="container-fluid">

  <div class="white-box">
    <div class="row">



        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="edit">
        <div class="col-md-4 col-xs-12">
            <div class="white-box">
              <div class="profile-widget">
                  <div class="profile-img">
                      <img style="width:175px;" src="/resources/uploads/profile_pictures/<?php echo $profile["profile_picture"]; ?>" alt="user-img" class="img-circle">
                      <p class="m-t-10 m-b-5"><a href="javascript:void(0);" class="profile-text font-22 font-semibold"><?php echo $profile["fullname"]; ?></a></p>
                      <span class="font-16"><?php echo $profile["location"]; ?></span>
                  </div>
                  <div class="profile-info">
                      <div class="col-xs-6 col-md-6 b-r">
                          <h1 class="text-success"><?php echo $profile["nb_review_positive"]; ?></h1>
                          <span class="font-16">Positive reviews</span>
                      </div>
                      <div class="col-xs-6 col-md-6">
                          <h1 class="text-danger"><?php echo $profile["nb_review_negative"]; ?></h1>
                          <span class="font-16">Negative reviews</span>
                      </div>
                  </div>
                  <hr/>
                  <div class="profile-detail font-15">
                      <div class="ribbon-wrapper-reverse">
                          <?php if ($profile["email_verified"] == "YES") { ?>
                          <div class="ribbon ribbon-right ribbon-success"><i class="fa fa-envelope"></i> &nbsp; Email verified</div>
                        <?php } else { ?>
                          <div class="ribbon ribbon-right ribbon-warning"><i class="fa fa-envelope"></i> &nbsp; Email not verified</div>
                          <?php } ?>
                          <br/>
                          <p class="ribbon-content">
                          <?php echo $profile["summary"]; ?>
                          </p>
                      </div>
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
                <div class="col-md-12 col-xs-12 b-r"> <strong>New password</strong>
                  <br>
                  <p class="text-muted"><input type="password" placeholder="Enter new password" class="form-control" name="new_password" value=""></p>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12 col-xs-12 b-r"> <strong>Confirm new password</strong>
                  <br>
                  <p class="text-muted"><input type="password" placeholder="Confirm new password" class="form-control" name="new_password_conf" value=""></p>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-md-12 col-xs-12 text-right">

                  <button type="submit" class="btn btn-success btn-outline m-r-0"><i class="fa fa-save"></i> Update my settings</button>
                  <button type="button" class="btn btn-danger btn-outline m-r-0" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-remove"></i> Close my account
                  </button>

                </div>
              </div>
          </div>
        </form>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmation needed</h4>
      </div>
      <div class="modal-body">
        <p>This action will close your account, are you sure?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a href="/profile/close_my_account" class="btn btn-danger">Yes, close my account...</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
