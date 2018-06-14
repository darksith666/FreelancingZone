<div class="container-fluid">

  <div class="white-box">
    <div class="row">
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

                  <div class="profile-btn">
                      <?php if ($is_contact) { ?>
                        <?php if ($is_contact_connected) { ?>
                          <a href="/contacts/talk/<?php echo $profile["id_user"]; ?>"  class="btn btn-primary btn-outline m-r-0"><i class="icon-bubbles fa-fw"></i> Start conversation</a>
                        <?php } else { ?>
                          <?php if ($has_request_from_me) { ?>
                            <a href="#"  class="btn btn-primary btn-outline m-r-0"><i class="fa fa-clock-o"></i> Waiting for contact to accept invitation</a>
                          <?php } ?>
                          <?php if ($has_request_from_contact) { ?>
                            <a href="/contacts/accept_connection/<?php echo $profile["id_user"]; ?>"  class="btn btn-success btn-outline m-r-0"><i class="fa fa-thumbs-o-up"></i> Accept contact request</a>
                          <?php } ?>
                        <?php } ?>
                      <?php } else { ?>
                        <a href="/freelancers/connect_request/<?php echo $profile["id_user"]; ?>" class="btn btn-success btn-outline m-r-0"><i class="fa fa-comment-o"></i> Connect with freelancer</a>
                      <?php } ?>
                  </div>

              </div>
            </div>
            <div class="white-box order-chart-widget">
                <h4 class="box-title">Job completion</h4>
                <?php if ($profile["nb_work_approved"] == 0 && $profile["nb_work_rejected"] == 0) { ?>
                  <br/>
                  <div class="text-center"><h3>No jobs yet.</h3></div>
                <?php } else { ?>
                  <div id="job-completion-chart" style="height: 350px;"></div>
                <?php }  ?>
                <ul class="list-inline m-b-0 m-t-20 t-a-c">
                    <li>
                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-danger"></i>Failed jobs</h6>
                    </li>
                    <li>
                        <h6 class="font-15"><i class="fa fa-circle m-r-5 text-success"></i>Successful jobs</h6>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box">
              <ul class="nav nav-tabs tabs customtab">
                  <li class="active tab">
                      <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                  </li>
                  <li class="tab">
                      <a href="#reviews" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Reviews</span> </a>
                  </li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                            <br>
                            <p class="text-muted"><?php echo $profile["fullname"]; ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                            <br>
                            <p class="text-muted"><?php echo $profile["mobile"]; ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                            <br>
                            <p class="text-muted"><?php
                            if ($profile["email_visibility"]=="PUBLIC") {
                              echo $profile["email"];
                            } else {
                              echo 'Hidden';
                            }
                            ?></p>
                        </div>
                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                            <br>
                            <p class="text-muted"><?php echo $profile["location"]; ?></p>
                        </div>
                    </div>
                    <hr>

                    <?php echo $profile["description"]; ?>
                    <?php if (empty($profile["description"])) { ?>
                      <p>Nothing yet.</p>
                    <?php } ?>
                    <h4 class="font-bold m-t-30">Skill Set</h4>
                    <hr>

                    <?php if (empty($profile["skills"])) { ?>
                      <p>Nothing yet.</p>
                    <?php } ?>
                    <?php foreach($profile["skills"] as $skill) { ?>
                      <h5><?php echo $skill["skill"]; ?> <span class="pull-right"><?php echo $skill["level"]; ?>%</span></h5>
                      <div class="progress">
                          <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $skill["level"]; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $skill["level"]; ?>%;"> <span class="sr-only"><?php echo $skill["level"]; ?>% Complete</span> </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="tab-pane" id="reviews">
                    <?php if (empty($profile["reviews"])) { echo 'Nothing yet.'; } ?>
                    <?php foreach($profile["reviews"] as $review) { ?>
                      <div class="row">
                        <div class="col-md-2 text-center">
                          <img src="/resources/uploads/profile_pictures/<?php echo $review["profile_picture"]; ?>" alt="user-img" style="width:64px;" class="img-circle">
                          <hr/>
                          <?php if ($review["type"] == "POSITIVE") { ?>
                            <strong class="text-success">Positive review</strong>
                          <?php } ?>
                          <?php if ($review["type"] == "NEGATIVE") { ?>
                            <strong class="text-danger">Negative review</strong>
                          <?php } ?>
                          <br/>by <?php echo $review["fullname"]; ?> on <?php echo $review["creationdate"]; ?>
                        </div>
                        <div class="col-md-10">
                          <div class="jumbotron">
                            <?php echo $review["review"]; ?>
                          </div>
                        </div>
                      </div><br/>
                    <?php } ?>
                  </div>
              </div>
            </div>
        </div>
    </div>
  </div>

</div>

<?php if ($profile["nb_work_approved"] > 0 || $profile["nb_work_rejected"] > 0) { ?>
<script>
Morris.Donut({
    element: 'job-completion-chart',
    data: [
    <?php if ($profile["nb_work_approved"] > 0) { ?>
    {
        label: "Successful jobs",
        value: <?php echo $profile["nb_work_approved"]; ?>
    }
    <?php } ?>
    <?php if ($profile["nb_work_approved"] > 0 && $profile["nb_work_rejected"] > 0) { ?>
    ,
    <?php } ?>
    <?php if ($profile["nb_work_rejected"] > 0) { ?>
    {
        label: "Failed jobs",
        value: <?php echo $profile["nb_work_rejected"]; ?>
    }
    <?php } ?>
    ],
    resize: true,
    colors: ['#2ecc71', '#e74a25']
});
</script>
<?php } ?>
