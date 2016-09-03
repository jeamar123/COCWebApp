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
                            <a href="<?php echo site_url('default_con/index/student_settings'); ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
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
                    <!-- <li class="ins">
                        <a ng-click="go_dash()" href="<?php// echo site_url() ?>" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-dashboard "></i> <span id="admin_li">&nbsp; Dashboard</span></a>
                    </li> -->
                    <li class="li ins">
                        <a id="dropmenu-classes-btn" href="#" class="hvr-icon-hang" ><i class="fa fa-fw fa-cubes"></i> &nbsp;My Classes </a>
                    </li>
                        <ul id="dropmenu-classes" class="nav navbar-nav dropmenu-sidenav"hidden>
                            <li class="li" ng-repeat="data in classe">
                                <a id="class-selected-btn" href='<?php echo site_url("default_con/index/topics")?>' class="hvr-icon-forward">{{data.subject}}</a>
                                <span id="class-selected-id" hidden>{{data.id}}</span>
                            </li>

                        </ul>
                    
                    
                    <!-- <li class="li ins">
                        <a href="#" class="hvr-icon-wobble-horizontal"><i class="fa fa-fw fa-file-text-o"></i> &nbsp; Results</a>
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
      var p = 0;
      var f = 0;
      var ctr = 1;
      var cats = [];
      var stud_pass = [];
      var stud_fail = [];

      function filter(){
        p = 0;
        f = 0;
        ctr = 1;
        cats = [];
        stud_pass = [];
        stud_fail = [];
        var sec = $("#sec").val();      
        var exam = $("#exam").val();
        console.log(sec);
            $.ajax({
                url: siteurl + '/exam_content_con/get_items',
                type: 'POST',
                dataType: 'JSON',
                data:{'exam_no':exam,},
                success: function(data) {
                    p = 0;
                    f = 0;
                    for(a in data){
                        cats.push('Item #'+ctr);
                        ctr++;
                        $.ajax({
                            url: siteurl + '/progress_items_con/get_items_analysis',
                            type: 'POST',
                            dataType: 'JSON',
                            data:{'item_no':data[a].id,'ins':admin,'sec':sec},
                            success: function(data) {
                                console.log(data);
                                var a = parseInt(data['pass'].length);    
                                var b = parseInt(data['fail'].length);    
                                var c = parseInt(data['total'].length);   

                                stud_pass.push(parseInt((a/c)*100)); 
                                stud_fail.push(parseInt((b/c)*100)); 
                            },
                            error: function(e) {
                                console.log(e.message);
                            }
                        });
                        if(a == (data.length-1)){
                            setTimeout(function(){
                                console.log(cats);
                                console.log(stud_pass);
                                console.log(stud_fail);
                                run_chart();
                            },500);
                        }
                    }
                    
                },
                error: function(e) {
                    console.log(e.message);
                }
            });  
        // else if(exam == "Exams" && sec != "Sections"){
        //     $.ajax({
        //         url: siteurl + '/students_con/get_items_analysis',
        //         type: 'POST',
        //         data:{'section':sec},
        //         success: function(data) {
        //             console.log(data);
        //         },
        //         error: function(e) {
        //             console.log(e.message);
        //         }
        //     });  
        // }else{
        //     $.ajax({
        //         url: siteurl + '/students_con/get_items_analysis',
        //         type: 'POST',
        //         data:{'section':sec,'exam':exam},
        //         success: function(data) {
        //             console.log(data);
        //         },
        //         error: function(e) {
        //             console.log(e.message);
        //         }
        //     });  
        // }   
      }

      function run_chart() { 



            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Item Analysis'
                },
                xAxis: {
                    categories: cats
                },
                yAxis: {
                    title: {
                        text: ' Percentage'
                    },
                    labels: {
                        formatter: function() {
                            return this.value + ' %';
                        }
                    },
                    tickInterval: 10
                },

                series: [{
                    name: 'Students Passed',
                    data: stud_pass,
                },{
                    name: 'Students Failed',
                    data: stud_fail,
                }   ],
                
            });
        }
    </script>
    <script src="<?php echo base_url('assets') ?>/js/style.js"></script>

</body>

</html>
