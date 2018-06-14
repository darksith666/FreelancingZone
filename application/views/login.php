

            <!-- ======= 1.06 Cta Area ====== -->
            <div class="ctaArea secPdngB animated">
            	<div class="container">
                <br/>
                <br/>
            		<div class="row">
            			<div class="col-md-6 ctaCol">
            				<div class="ctaLeft ctaTxt">
        						<div class="ctaCell">
        							<div class="h2">Post jobs, apply to jobs and communicate for free!</div>
                      <?php if ($error) { ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $error; ?>
                        </div>
                      <?php } ?>
                      <form  class="accountForm" method="post" action="/authentication/login">
                        <input type="hidden" name="action" value="login">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="accountInput">
                              <div class="h5">Your email:</div>
                              <input type="text" name="email" placeholder="Enter your email">
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="accountInput">
                              <div class="h5">Password:</div>
                              <input type="password" name="password" placeholder="*********">
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-info btn-block" type="submit" style="font-size:1.0em;"><i class="fa fa-sign-in"></i> Log in</button>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <a href="<?php echo $loginUrl; ?>" class="btn btn-primary btn-block" style="font-size:1.0em;"><i class="fa fa-facebook-square"></i> Continue with Facebook</a>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-6 ">
                            <a href="/authentication/reset"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                          </div>
                          <div class="col-md-6 text-right">
                            <a href="/authentication/register" class="text-primary m-l-5"><i class="fa  fa-arrow-circle-right"></i> Sign Up for free</a>
                          </div>
                        </div>
                      </form>
                      <br/>
        						</div>
            				</div>
            			</div>
            			<div class="col-md-5 col-md-offset-1 ctaColBtm">
            				<div class="ctaImgTwo">
            					<img src="/resources/main/img/home-dsk-2.png" alt="">
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <!-- ======= /1.06 Cta Area ====== -->
