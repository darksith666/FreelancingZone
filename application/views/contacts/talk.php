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

                <?php if ($contact["status"] == "BLOCKED") { ?>
                  <br/>
                  <span class="font-16 text-warning">User is currently blocked</span>
                  <br/>
                <?php } ?>

                <?php if ($has_blocked_me) { ?>
                  <br/>
                  <span class="font-16 text-warning">You have been blocked by this contact</span>
                  <br/>
                <?php } ?>

                <div class="profile-btn">
                    <a href="/freelancers/view/<?php echo $profile["id_user"]; ?>" class="btn btn-default btn-outline m-r-0"><i class="fa fa-eye"></i> View profile</a>
                    <?php if ($is_contact_connected) { ?>
                      <?php if ($contact["status"] == "BLOCKED" && !$has_blocked_me) { ?>
                        <a href="/contacts/unblock/<?php echo $profile["id_user"]; ?>" class="btn btn-success btn-outline m-r-0"><i class="fa fa-check-circle"></i> Unblock contact</a>
                      <?php } ?>
                      <?php if ($contact["status"] == "CONNECTED" && !$has_blocked_me) { ?>
                        <a href="/contacts/block/<?php echo $profile["id_user"]; ?>" class="btn btn-warning btn-outline m-r-0"><i class="fa fa-times-circle-o"></i> Block contact</a>
                      <?php } ?>
                    <?php } else { ?>
                      <?php if ($has_request_from_me) { ?>
                        <a href="#"  class="btn btn-primary btn-outline m-r-0"><i class="fa fa-clock-o"></i> Waiting for contact to accept invitation</a>
                      <?php } ?>
                      <?php if ($has_request_from_contact) { ?>
                        <a href="/contacts/accept_connection/<?php echo $profile["id_user"]; ?>"  class="btn btn-success btn-outline m-r-0"><i class="fa fa-thumbs-o-up"></i> Accept contact request</a>
                      <?php } ?>
                    <?php } ?>
                </div>
            </div>
          </div>
      </div>
        <div class="col-md-8 col-xs-12">
            <div class="white-box chat-widget">
                  <h4 class="box-title">Chat</h4>
                  <div style="overflow-y:scroll;max-height:800px;" id="chatarea">
                    <?php if (empty($messages)) { ?>
                      No messages
                    <?php } else { ?>
                    <ul class="chat-list slimscroll" tabindex="5005">
                      <?php foreach($messages as $message) { ?>
                        <?php if ($message["from"] == "contact") { ?>
                        <li>
                            <div class="chat-image"> <img alt="male" src="/resources/uploads/profile_pictures/<?php echo $message["source_profile_picture"]; ?>"> </div>
                            <div class="chat-body">
                                <div class="chat-text">
                                    <p><span class="font-semibold"><?php echo $message["source_fullname"]; ?></span> <?php echo $message["message"]; ?> </p>
                                </div>
                                <span><?php echo $message["creationdate"]; ?></span>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if ($message["from"] == "me") { ?>
                        <li class="odd">
                            <div class="chat-body">

                                <div class="chat-text">
                                    <p> <?php echo $message["message"]; ?> </p>
                                </div>
                                <span><?php echo $message["creationdate"]; ?></span>
                            </div>
                        </li>
                        <?php } ?>
                      <?php } ?>
                    </ul>
                    <?php } ?>
                  </div>
                  <?php if ($is_contact_connected) { ?>
                  <div class="chat-send">
                    <form method="post" id="sendmsg">
                      <input type="hidden" name="action" value="sendmsg">
                      <input type="text" <?php if ($is_blocked) { echo ' readonly '; } ?> class="form-control" name="msg" id="msg" placeholder="Write your message">
                      <i class="fa fa-comment-o"></i>
                    </form>
                  </div>
                  <?php } ?>
            </div>
        </div>
    </div>
  </div>

</div>

<script>
$('#chatarea').scrollTop($('#chatarea')[0].scrollHeight);
$('#msg').keypress(function (e) {
  if (e.which == 13) {
    <?php if (!$is_blocked) { echo " $('form#sendmsg').submit(); "; } ?>
    return false;
  }
});
</script>
