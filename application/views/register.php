            <?php if ($from_adfly_banner_ad) { ?>
              <!-- begin adf.ly conversion tracking --><img src="http://adf.ly/ad/conv?aid=935223" width="1" height="1" border="0" hspace="0" vspace="0" style="position: absolute; left: -1000px; top: -1000px;" /><!-- end adf.ly conversion tracking -->
            <?php } ?>

            <!-- ======= 1.06 Cta Area ====== -->
            <div class="ctaArea secPdngB animated">
            	<div class="container">
                <br/>
                <br/>
            		<div class="row">
            			<div class="col-md-6 ctaCol">
            				<div class="ctaLeft ctaTxt">
        						<div class="ctaCell">
        							<div class="h2">Sign Up for free, no credit card required.</div>


                      <div class="row">
                        <div class="col-md-12">
                          <a href="<?php echo $loginUrl; ?>" class="btn btn-primary btn-block" style="font-size:1.0em;"><i class="fa fa-facebook-square"></i> Continue with Facebook</a>
                        </div>
                      </div>
                      <hr/>
                      <?php if ($error) { ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $error; ?>
                        </div>
                      <?php } ?>
                      <form  class="accountForm" method="post" action="/authentication/register">
                        <input type="hidden" name="action" value="register">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="accountInput">
                              <div class="h5">Your name:</div>
                              <input type="text"  required="" placeholder="Name" name="fullname" value="<?php echo $fullname; ?>">
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="accountInput">
                              <div class="h5">Your email:</div>
                              <input type="text"  required="" placeholder="Email" name="email" value="<?php echo $email; ?>">
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="accountInput">
                              <div class="h5">Your password:</div>
                              <input  type="password" required="" placeholder="Password" name="password">
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="accountInput">
                              <div class="h5">Confirm password:</div>
                              <input  type="password" required="" placeholder="Confirm Password" name="passwordconf">
                            </div>
                          </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col-sm-12">
                						By creating an account you agree to all <a href="/terms" target="_blank">Terms</a>
                          </div>
                        </div>

                        <br/>
                        <div class="row">
                          <div class="col-md-12">
                            <button class="btn btn-info btn-block" type="submit" style="font-size:1.0em;"><i class="fa fa-sign-in"></i> Sign up</button>
                          </div>
                        </div>
                      </form>
                      <br/>
                      <p>Already have an account? <a href="/authentication/login" class="text-primary m-l-5"><b>Sign In</b></a></p>
        						</div>
            				</div>
            			</div>
            			<div class="col-md-6 ctaColBtm">
                    <div class="singleTst animated fadeInUp" style="opacity: 1;">
                      <br/>
            					<h4>
                        Welcome to freelancing.zone, a 100% free outsourcing platform made for freelancers. Post jobs, apply for jobs and communicate for free!
                        <br/>
                        <br/>
                        Start working from home today!
                      </h4>
                      <!--
                      <div class="row">
                        <div class="col-md-7 text-right">
                        </div>
                        <div class="col-md-2 text-right">
                          <div class="fb-share-button" data-href="https://www.freelancing.zone/authentication/register" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.freelancing.zone%2Fauthentication%2Fregister&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                        </div>
                        <div class="col-md-4 text-right">
                          <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="100% free outsourcing platform, freelancing without the fees ;)" data-url="https://goo.gl/1Dox5H" data-hashtags="freelance" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                      </div>
                    -->
            				</div>

                    <br/>

            				<div class="ctaImgTwo">
            					<img src="/resources/main/img/home-dsk-2.png" alt="">
            				</div>

            			</div>
            		</div>
            	</div>
            </div>
            <!-- ======= /1.06 Cta Area ====== -->
