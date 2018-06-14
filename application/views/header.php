<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="freelancing.zone is a 100% free outsourcing platform. Post jobs, apply for jobs and communicate for free!">
    <meta name="Keywords" content="adobe flash, english to spanish, translator, aliexpress, usa jobs, indeed jobs, jobs near me, work from home jobs, part time work from home jobs, usajobs, freelance writing, freelance writing jobs, freelance jobs, freelance, freelancing, free, outsource, outsourcing, jobs, freelancer jobs, work, work from home, make money, make money online, freelancer, outsourcing jobs">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/resources/images/favicon.png">
    <title>freelancing.zone</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="/resources/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="/resources/components/gridstack/gridstack.css" rel="stylesheet">
    <link href="/resources/components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/resources/components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="/resources/components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="/resources/components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/resources/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/resources/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href='/resources/components/fullcalendar/fullcalendar.css' rel='stylesheet'>
    <link rel="stylesheet" href="/resources/components/html5-editor/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" href="/resources/components/dropify/dist/css/dropify.min.css">

    <!-- ===== Animation CSS ===== -->
    <link href="/resources/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="/resources/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="/resources/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="/resources/components/jquery/dist/jquery.min.js"></script>

    <script src="/resources/components/jqueryui/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>

    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="/resources/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="/resources/js/jquery.slimscroll.js"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="/resources/js/waves.js"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="/resources/js/sidebarmenu.js"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="/resources/js/custom.js"></script>
    <!-- ===== Plugin JS ===== -->

    <script src='/resources/components/moment/moment.js'></script>
    <script src="/resources/components/gridstack/gridstack.js"></script>
    <script src="/resources/components/gridstack/gridstack.jQueryUI.js"></script>
    <script src="/resources/components/switchery/dist/switchery.min.js"></script>
    <script src="/resources/components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="/resources/components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/resources/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/resources/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script src='/resources/components/fullcalendar/fullcalendar.js'></script>
    <script src="/resources/components/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="/resources/components/html5-editor/bootstrap-wysihtml5.js"></script>
    <script src="/resources/components/dropify/dist/js/dropify.min.js"></script>

    <script src="/resources/components/raphael/raphael-min.js"></script>
    <script src="/resources/components/morrisjs/morris.js"></script>

    <!-- ===== Style Switcher JS ===== -->
    <script src="/resources/components/styleswitcher/jQuery.style.switcher.js"></script>


</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- ===== Top-Navigation ===== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" href="/">
                        <b>
                            <img src="/resources/images/logo.png" style="width:34px;" alt="home" />
                        </b>
                        <span>
                            freelancing.zone
                        </span>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                            <i class="icon-speech"></i>
                            <?php if ($header_topmenu_notifications["total"] > 0) { ?>
                              <span class="badge badge-xs badge-danger"><?php echo $header_topmenu_notifications["total"]; ?></span>
                            <?php } ?>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have <?php echo $header_topmenu_notifications["total"]; ?> new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <?php foreach($header_topmenu_notifications["notifications"] as $notification) { ?>
                                    <a href="/profile/clear_notification/<?php echo $notification["id_notification"]; ?>">
                                        <div class="user-img">
                                            <img src="/resources/uploads/profile_pictures/<?php echo $notification["profile_picture"]; ?>" alt="user" class="img-circle">
                                        </div>
                                        <div class="mail-contnet">
                                            <h5><?php echo $notification["fullname"]; ?></h5>
                                            <span class="mail-desc"><?php echo $notification["notification"]; ?></span>
                                            <span class="time"><?php echo $notification["creationdate"]; ?></span>
                                        </div>
                                    </a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="/profile/clear_all_notifications">
                                    <strong>Clear all notifications</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                            <i class="icon-calender"></i>
                            <?php if (count($header_topmenu_tasks) > 0) { ?>
                            <span class="badge badge-xs badge-danger"><?php echo count($header_topmenu_tasks); ?></span>
                            <?php } ?>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <?php foreach($header_topmenu_tasks as $task) { ?>
                            <li>
                                <a href="/jobs/edit/<?php echo $task["id_job"]; ?>">
                                    <div>
                                        <p>
                                            <strong><?php echo $task["milestone"]["milestone"]; ?></strong>
                                            <span class="pull-right text-muted"><?php echo $task["milestone"]["progress"]; ?>% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $task["milestone"]["progress"]; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $task["milestone"]["progress"]; ?>%">
                                                <span class="sr-only"><?php echo $task["milestone"]["progress"]; ?>% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <?php } ?>
                            <li>
                                <a class="text-center" href="/jobs">
                                    <strong>See All Tasks</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <aside class="sidebar" role="navigation">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div class="profile-image">
                            <img src="/resources/uploads/profile_pictures/<?php echo $_SESSION["profile_picture"]; ?>" alt="user-img" class="img-circle">
                            <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-danger">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li><a href="/profile/settings"><i class="fa fa-cog"></i> Account Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/authentication/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> <?php echo $_SESSION["fullname"]; ?> </a></p>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="side-menu">
                        <li>
                            <a href="/dashboard" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard </span></a>
                        </li>


                        <li>
                          <a href="/projects" aria-expanded="false"><i class="icon-rocket fa-fw"></i> <span class="hide-menu"> Find jobs </span></a>
                        </li>

                        <li>
                          <a href="/freelancers" aria-expanded="false"><i class="icon-people fa-fw"></i> <span class="hide-menu"> Find freelancers </span></a>
                        </li>

                        <li>
                          <a href="/projects/myprojects" aria-expanded="false"><i class="icon-diamond fa-fw"></i> <span class="hide-menu"> Post jobs </span></a>
                        </li>

                        <li>
                          <a href="/jobs" aria-expanded="false"><i class="icon-briefcase fa-fw"></i> <span class="hide-menu"> My jobs </span></a>
                        </li>

                        <li>
                          <a href="/contacts" aria-expanded="false"><i class="icon-bubbles fa-fw"></i> <span class="hide-menu"> Contacts </span></a>
                        </li>

                        <li>
                          <a href="/profile" aria-expanded="false"><i class="icon-user fa-fw"></i> <span class="hide-menu"> My profile </span></a>
                        </li>
                        <?php
                        if (
                          $_SESSION["authenticated"] == true &&
                          $_SESSION["email"] == "maxime.labelle@owasp.org" &&
                          $_SESSION["id_user"] == 116
                        ) { ?>

                          <li>
                            <a href="/admin/admin_panel_blog_posts" aria-expanded="false"><span class="hide-menu"> Blog admin </span></a>
                          </li>
                          <li>
                            <a href="/admin/admin_panel_new_projects" aria-expanded="false"><span class="hide-menu"> Projects admin </span></a>
                          </li>
                        <?php } ?>
                    </ul>
                    <!--
                    <br/>
                    <div class="text-center" align="center" style="align:center;">

                    </div>
                    -->
                </nav>
            </div>
        </aside>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div class="page-wrapper">
