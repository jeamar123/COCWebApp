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
<body >
    <div id="wrapper" ng-app="App" ng-controller="mainController">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i id="ic" class="fa fa-user hvr-buzz"></i>&nbsp; Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       <!--  <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li> -->
                        <li>
                            <a href="<?php echo site_url("default_con/index/admin_settings")?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url('base_controller/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <ul class="nav navbar-nav side-nav">
                    <div class="border-sidenav"></div>
                    <div class="border-sidenav"></div>
                    <li class="ins">
                        <a ng-click="go_dash()" href="<?php echo site_url("default_con/index/dashboard_admin") ?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-dashboard "></i>&nbsp; <span id="admin_li">Dashboard</span></a>
                    </li>
                    <li class="li admin">
                        <a href="<?php echo site_url("default_con/index/instructors")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-user-plus"></i>&nbsp; Instructors </a>
                    </li>
                    <li class="li admin">
                        <a  href="<?php echo site_url("default_con/index/students")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-users"></i>&nbsp; Students </a>
                    </li>
                    <!-- <li class="li admin">
                        <a href="<?php //echo site_url("default_con/index/sections")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-cube"></i>&nbsp; Sections </a>
                    </li> -->
                    <li class="li admin">
                        <a href="<?php echo site_url("default_con/index/subjects")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-th"></i>&nbsp; Subjects </a>
                    </li>
                    <li class="li ins">
                        <a href="<?php echo site_url("default_con/index/classes")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-cubes"></i> &nbsp; Classes </a>
                    </li>
                    <!-- <li class="li admin">
                        <a href="<?php //echo site_url("default_con/index/sections")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-database"></i>&nbsp; Sections </a>
                    </li> --><!-- 
                    <li class="li ins">
                        <a href="<?php //echo site_url("default_con/index/announcements")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-users"></i> &nbsp; Announcements </a>
                    </li>
                    <li class="li ins">
                        <a href="<?php //echo site_url("default_con/index/assignments")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-tasks"></i> &nbsp; Assignments</a>
                    </li>
                    <li class="li ins">
                        <a href="<?php //echo site_url("default_con/index/quizzes")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-tasks"></i> &nbsp; Quizzes</a>
                    </li>
                    <li class="li ins">
                        <a href="<?php //echo site_url("default_con/index/exams")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-tasks"></i> &nbsp; Exams</a>
                    </li>
                    <li class="li ins">
                        <a href="<?php //echo site_url("default_con/index/results")?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-file-text-o"></i> &nbsp; Results</a>
                    </li> -->
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
    <script src="<?php echo base_url('assets') ?>/js/ins-style.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/classes-style.js"></script>
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
