<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <?php if ($registration) { ?>
          <div class="alert alert-success" role="alert">
            Welcome aboard! Check your emails and follow the link we sent to verify your email address.
          </div>
        <?php } ?>
        <div class="row colorbox-group-widget">
            <div class="col-md-6 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-primary">
                        <div class="media-body">
                            <h3 class="info-count"><?php echo $registration_today; ?> <span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                            <p class="info-text font-12">New users today</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 info-color-box">
                <div class="white-box">
                    <div class="media bg-success">
                        <div class="media-body">
                            <h3 class="info-count"><?php echo $registration_total; ?> <span class="pull-right"><i class="icon-people"></i></span></h3>
                            <p class="info-text font-12">Total Freelancers</p>
                        </div>
                    </div>
                </div>
            </div>

          </div>
    </div>
  </div>

  <div class="row">
      <div class="col-md-12">

        <div class="white-box activity-widget">
            <h4 class="box-title">Activity Log</h4>
            <div class="steamline">
              <?php foreach($activity as $log) { ?>
                <div class="sl-item">
                    <div class="sl-left">
                        <div>
                            <img class="img-circle" alt="user" src="/resources/uploads/profile_pictures/<?php echo $log["profile_picture"]; ?>">
                        </div>
                    </div>
                    <div class="sl-right">
                        <div><a href="/freelancers/view/<?php echo $log["id_user"]; ?>" class="text-link font-semibold"><?php echo $log["fullname"]; ?></a>, <?php echo $log["activity"]; ?></a></div>
                        <p><?php echo $log["time_since"]; ?> ago</p>
                    </div>
                </div>
                <?php } ?>
            </div>


  </div>
</div>
