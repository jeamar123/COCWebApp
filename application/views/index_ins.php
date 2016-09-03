<!DOCTYPE html>
<html lang="en">
<head>
    <title>Criminology Review Center</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets') ?>/img/logo.png" />
    <link href="<?php echo base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/hover-min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper" ng-app="App" ng-controller="mainController">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand nav-img-logo" href="<?php echo site_url('default_con') ?>"><img src="<?php echo base_url('assets') ?>/img/logo.png" style="height:40px;width:40px;"></a>
            </div>

            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php foreach($user as $data ){echo "<img src=". base_url("assets/img/$data->img"). " style='width:21px;height:21px;margin-right:10px;margin-top:-2px;border-radius:50%;'><span id='admin-id' hidden>".$data->id."</span>" . $data->name;}  ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li> -->
                        <li>
                            <a href="<?php echo site_url('default_con/index/instructor_settings'); ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url('base_controller/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >

                <ul class="nav navbar-nav side-nav">
                    <div class="border-sidenav"></div>
                    <div class="border-sidenav"></div>
                    <!-- <li class="li active">
                        <a id="class-selected-name" href=""></a>
                    </li> -->
                    <li class="li ins">
                        <a href="<?php echo site_url("default_con/index/students")?>" class="hvr-icon-wobble-horizontal" ><i class="fa fa-fw fa-users"></i> &nbsp;Students </a>
                    </li>
                    <li class="li ins">
                        <a href="<?php echo site_url("default_con/index/topics")?>" class="hvr-icon-wobble-horizontal" ><i class="fa fa-fw fa-book"></i> &nbsp;Topics </a>
                    </li>
                    <!-- <li class="ins">
                        <a href="<?php //echo site_url("default_con/index/assignments")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-clipboard"></i> &nbsp;Assignments</a>
                    </li>
                    <li class="ins">
                        <a href="<?php //echo site_url("default_con/index/quizzes")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-files-o"></i> &nbsp;Quizzes</a>
                    </li> -->
                    <li class="ins">
                        <a href="<?php echo site_url("default_con/index/exams")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-file-text-o"></i> &nbsp;Exams</a>
                    </li>
                    <li class="li ins">
                        <a href="<?php echo site_url("default_con/index/results")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-file-text"></i> &nbsp; Results</a>
                    </li>
                    <li class="ins">
                        <a href="<?php echo site_url("default_con/index/dashboard")?>" class="hvr-icon-back"><span style="margin-left:20px;">Back to Classes</span></a>
                    </li>
                    
                </ul>
            </div>
        </nav>

        <?php
            $this->load->view($view);
        ?>

    </div>
    <!-- /#wrapper -->

    <script src="<?php echo base_url('assets') ?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/exam-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/classes-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/topics-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/assignments-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/quizzes-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/student-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/section-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/subjects-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/timer-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/results-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/angular-route.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/ui-bootstrap-tpls-0.13.0.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/highcharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets') ?>/js/summernote.min.js"></script>
    <script type="text/javascript">
      var baseurl = "<?php print base_url(); ?>";
      var siteurl = "<?php print site_url(); ?>";
      var admin = $("#admin-id").text();
      new WOW().init();
    </script>
    <script src="<?php echo base_url('assets') ?>/js/style.js"></script>

</body>

</html>
