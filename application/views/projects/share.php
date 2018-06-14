<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/resources/images/favicon.png">
    <title>Cubic Admin Template</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="/resources/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
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
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

    <section id="wrapper">
      <div class="white-box">
        <div class="row">
            <div class="col-md-12">
              <form method="post">
                <input type="hidden" name="action" value="edit">

                <h3 class="box-title">Edit project</h3>
                <br/>

                <div class="form-group">
                    <input class="form-control" placeholder="Title" name="title" value="<?php echo $project["title"]; ?>">
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Category</span>
                    <select class="form-control select2" name="id_category">
                      <?php foreach($categories as $category_group) { ?>
                        <optgroup label="<?php echo $category_group["group_label"]; ?>">
                        <?php foreach($category_group["categories"] as $category) { ?>
                          <option  <?php if ($project["id_category"]==$category["id_category"]) { echo ' SELECTED '; } ?> value="<?php echo $category["id_category"]; ?>"><?php echo $category["category_label"]; ?></option>
                        <?php } ?>
                      </optgroup>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group m-b-30">
                    <span class="input-group-addon">Skills</span>
                    <input type="text" name="skills"  value="<?php echo $project["skills"]; ?>" data-role="tagsinput" placeholder="add skills" style="display: none;">
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Type</span>
                    <select class="form-control" name="type">
                      <option value="FIXED" <?php if ($project["type"]=="FIXED") { echo ' SELECTED '; } ?>>Fixed</option>
                      <option value="HOURLY" <?php if ($project["type"]=="HOURLY") { echo ' SELECTED '; } ?>>Hourly</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input class="form-control"  value="<?php echo $project["amount"]; ?>" min="0" step="any" placeholder="Amount" type="number" name="amount">
                  </div>
                </div>

                <div class="form-group">
                    <textarea class="textarea_editor form-control" rows="15" placeholder="Enter description..." name="description"><?php echo $project["description"]; ?></textarea>
                </div>

                <div class="form-group">
                  <h4><i class="ti-link"></i> Attachment (max size 2mb)</h4>
                  <input type="file" id="input-file-now" class="dropify" name="file"/>
                </div>

                <hr>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <a class="btn btn-default" href="/projects/myprojects "><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </section>
    <!-- jQuery -->
    <script src="/resources/components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/resources/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="/resources/js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="/resources/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/resources/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/resources/js/custom.js"></script>
    <!--Style Switcher -->
    <script src="/resources/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
