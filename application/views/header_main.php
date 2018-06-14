<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="freelancing.zone is a 100% free outsourcing platform. Post jobs, apply for jobs and communicate for free!">
    <meta name="Keywords" content="usa jobs, indeed jobs, jobs near me, work from home jobs, part time work from home jobs, usajobs, freelance writing, freelance writing jobs, freelance jobs, freelance, freelancing, free, outsource, outsourcing, jobs, freelancer jobs, work, work from home, make money, make money online, freelancer, outsourcing jobs">
    <title>freelancing.zone</title>

    <!-- main css file -->
    <link rel="stylesheet" href="/resources/main/css/custom/style.css">
    <!-- responsive css file -->
    <link rel="stylesheet" href="/resources/main/css/responsive/responsive.css">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="/resources/main/img/favicon.png">

    <!-- For Facebook -->
    <meta property="og:title" content="<?php if ($header_view_name == "blog/post") { echo $post["title"]; } else { echo 'freelancing.zone 100% free outsourcing platform'; } ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="https://www.freelancing.zone/resources/main/img/freelancingzoneshare.jpg" />
    <meta property="og:url" content="https://www.freelancing.zone" />
    <meta property="og:description" content="freelancing.zone is a 100% free outsourcing platform. Post jobs, apply for jobs and communicate for free!" />

    <!-- For Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php if ($header_view_name == "blog/post") { echo $post["title"]; } else { echo 'freelancing.zone 100% free outsourcing platform'; } ?>" />
    <meta name="twitter:description" content="freelancing.zone is a 100% free outsourcing platform. Post jobs, apply for jobs and communicate for free!" />
    <meta name="twitter:image" content="https://www.freelancing.zone/resources/main/img/freelancingzoneshare.jpg" />

    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId            : 'your-app-id',
          autoLogAppEvents : true,
          xfbml            : true,
          version          : 'v2.12'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5a9ef8259c502900133c1a1d&product=inline-share-buttons"></script>

    </head>
    <body class="home">

    <div class="preloader">
        <div class="sk-cube-grid">
          <div class="sk-cube sk-cube1"></div>
          <div class="sk-cube sk-cube2"></div>
          <div class="sk-cube sk-cube3"></div>
          <div class="sk-cube sk-cube4"></div>
          <div class="sk-cube sk-cube5"></div>
          <div class="sk-cube sk-cube6"></div>
          <div class="sk-cube sk-cube7"></div>
          <div class="sk-cube sk-cube8"></div>
          <div class="sk-cube sk-cube9"></div>
        </div>
    </div>

    <!-- ======= 1.01 Header Area ====== -->
    <header>
        <div class="headerBottomArea">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-9" >
                        <a href="https://www.freelancing.zone" class="logo"><img src="/resources/main/img/logo.png" alt="" > &nbsp; freelancing.zone</a>
                    </div>
                    <div class="col-md-8 menuCol col-sm-8 col-xs-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only"></span>
                                <i class="fa fa-navicon"></i>
                            </button>
                        </div>
                        <nav id="navbar" class="collapse navbar-collapse">
                            <ul id="nav">
                              <li  <?php if ($header_view_name == "home") { echo ' class="current-menu-item" '; } ?> >
                                <a href="https://www.freelancing.zone">Home</a>
                              </li>
                              <li  <?php if ($header_view_name == "login") { echo ' class="current-menu-item" '; } ?>>
                                <a href="/authentication/login">Login</a>
                              </li>
                              <li <?php if ($header_view_name == "register") { echo ' class="current-menu-item" '; } ?>?>
                                <a href="/authentication/register">Sign up</a>
                              </li>
                              <li <?php if ($header_view_name == "faq") { echo ' class="current-menu-item" '; } ?>>
                                <a href="/faq">FAQ</a>
                              </li>
                              <li <?php if ($header_view_name == "blog/posts" || $header_view_name == "blog/post") { echo ' class="current-menu-item" '; } ?>>
                                <a href="/blog">Blog</a>
                              </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-1 cartCol" align="center">
                        <a href="https://twitter.com/freelancingzone" class="cart" target="_blank">
                            <i class="icofont icofont-social-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ======= /1.01 Header Area ====== -->

        <!-- ======= 2.01 Page Title Area ====== -->
        <!--
        <div class="pageTitleArea animated">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12 text-center">
                <div align="center" style="align:center;">

                </div>
        			</div>
        		</div>
        	</div>
        </div>
        -->
