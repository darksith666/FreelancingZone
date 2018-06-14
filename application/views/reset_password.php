

            <!-- ======= 1.06 Cta Area ====== -->
            <div class="ctaArea secPdngB animated">
            	<div class="container">
                <br/>
                <br/>
            		<div class="row">
            			<div class="col-md-6 ctaCol">
            				<div class="ctaLeft ctaTxt">
        						<div class="ctaCell">
        							<div class="h2" >Reset your password and login to your account.</div>
                      <?php if ($error) { ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $error; ?>
                        </div>
                      <?php } ?>
                      <form  class="accountForm" method="post">
                        <input type="hidden" name="action" value="reset">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="accountInput">
                              <div class="h5">New password:</div>
                              <input  type="password" required="" placeholder="Password" name="password">
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="accountInput">
                              <div class="h5">Confirm new password:</div>
                              <input  type="password" required="" placeholder="Confirm Password" name="passwordconf">
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-success btn-block" type="submit" style="font-size:1.0em;"><i class="fa fa-sign-in"></i> Reset my password</button>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-md-6 ">
                            <p><a href="/authentication/login" class="text-primary m-l-5"><i class="fa  fa-arrow-circle-left"></i> <b>Sign In</b></a></p>
                          </div>
                          <div class="col-md-6 text-right">
                            <a href="/authentication/register" class="text-primary m-l-5"><i class="fa  fa-arrow-circle-right"></i> Sign Up</a>
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
