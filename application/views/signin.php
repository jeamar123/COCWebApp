<!DOCTYPE html>
<html>
<head>
  <title>Criminology Review Center</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets') ?>/img/logo.png" />
  <link href="<?php echo base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets') ?>/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets') ?>/css/hover-min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets') ?>/css/signin.css" rel="stylesheet">
  <link href="<?php echo base_url('assets') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body ng-app="App" ng-controller="mainController">
    
    <section id="body-wrapper" class="col-md-12" >
      <div class="content-wrapper" >
        <div class="col-md-12">
          <div class="col-md-8">
            <div class="logo-wrapper col-md-12">
              <div class="col-md-4">
                <img class="logo" src="<?php echo base_url('assets') ?>/img/logo.png">
              </div>
              <div class="col-md-8">
                <div class="title">
                  <p>Cagayan de Oro College</p>
                  <h3>Criminology Review Center</h3>   
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="navigation">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <nav class="navbar navbar-ex1-collapse navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li><a href="<?php// echo site_url('default_con') ?>"><i class="glyphicon glyphicon-home"></i>&nbsp; Home</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="glyphicon glyphicon-info-sign"></i>&nbsp; About</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="glyphicon glyphicon-user"></i>&nbsp; Developers</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div> -->
            <div class="row">
              <div class="col-md-12">
                <div class="forms">
                  <div id="login-form" class="cust-form">
                    <form>
                      <div class="form-group">
                        <h5><i class="glyphicon glyphicon-lock"></i>&nbsp; <b>Sign In</b></h5>
                        <div class="divider-horizontal"></div><br>    
                        <input id="username" type="text" class="form-control" placeholder="Id Number or Username" required><br>
                        <input id="password" type="password" class="form-control" placeholder="Password" required><br>
                        <button id="signin-btn" class="btn btn-primary hvr-icon-wobble-horizontal">Sign in</button><br><br>
                        <div id="success-0" class="alert alert-success" role="alert" hidden><b>Welcome !</b></div> 
                        <div id="error-0" class="alert alert-danger" role="alert" hidden><b>Invalid Username or Password !</b></div>
                      </div>
                    </form>
                  </div>
                  <div id="student-signup-form" class="cust-form" hidden >
                    <form>
                      <div class="form-group">
                        <h5><i class="glyphicon glyphicon-edit"></i>&nbsp; <b>Sign Up</b> <span style="font-size:14px;"> - I'm a student</span></h5> 
                        <div class="divider-horizontal"></div><br>    
                        <input id="idnum" type="text" class="form-control" placeholder="Id Number" required><br>
                        <input id="std-fname" type="text" class="form-control" placeholder="Fullname" required><br>
                        <!-- <select id="class" class="form-control">
                          <option value="" selected>Section</option>
                          <option ng-repeat="data in sections">{{data.section}}</option>
                        </select><br> -->
                        <input id="std-password" type="password" class="form-control" placeholder="Password" required><br>
                        <button id="signup-std-btn" class="btn btn-primary hvr-icon-wobble-horizontal" >Submit</button><br><br> 
                        <div id="success" class="alert alert-success" role="alert" hidden><b>Registration Successful !</b></div> 
                        <div id="error" class="alert alert-danger" role="alert" hidden><b>ERROR !</b> Registration Failed.</div>
                      </div>
                    </form>
                  </div>
                  <div id="ins-signup-form" class="cust-form" hidden>
                    <form>
                      <div class="form-group">
                        <h5><i class="glyphicon glyphicon-edit"></i>&nbsp; <b>Sign Up</b> <span style="font-size:14px;"> - I'm a Teacher  </span></h5>
                        <div class="divider-horizontal"></div><br>    
                        <input id="ins-fname" type="text" class="form-control" placeholder="Fullname" required><br>
                        <input id="uname" type="text" class="form-control" placeholder="Username" required><br>
                        <input id="ins-password" type="password" class="form-control" placeholder="Password" required><br>
                        <button id="signup-ins-btn" class="btn btn-primary hvr-icon-wobble-horizontal">Submit</button><br><br> 
                        <div id="success-2" class="alert alert-success" role="alert" hidden><b>Registration Successful !</b></div> 
                        <div id="error-2" class="alert alert-danger" role="alert" hidden><b>ERROR !</b> Registration Failed.</div>  
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div id="type-form" class="login-type">
                  <div class="row">
                    <div class="col-md-12">
                      <h5><i class="glyphicon glyphicon-edit"></i>&nbsp; <b>Sign Up</b></h5>
                      <div class="divider-horizontal"></div><br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <button id="std-show" class="btn btn-primary">I'm a Student</button>
                    </div>
                    <div class="col-md-6">
                      <button id="ins-show" class="btn btn-primary">I'm a Teacher</button>
                    </div>
                  </div>
                </div>

                <div id="back-form" class="" hidden>
                  <div class="row">
                    <div class="col-md-12">
                      <button id="back-btn" class="btn btn-default">Log in <i class="glyphicon glyphicon-log-in"></i></button>
                      <!-- <h5><i class="glyphicon glyphicon-lock"></i>&nbsp; <b>Sign In</b></h5> -->
                      <!-- <div class="divider-horizontal"></div><br> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="col-md-12">
      <div class="separator"></div>
      <p>COC - Criminology Review Center &copy;  Copyright 2015</p>
    </footer>
</body>

    <script src="<?php echo base_url('assets') ?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/js/session-style.js"></script>
    
    <script src="<?php echo base_url('assets') ?>/js/wow.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/angular-route.min.js') ?>"></script>
    <script src="<?php echo base_url('assets') ?>/js/style.js"></script>
    <script type="text/javascript">
      var baseurl = "<?php print base_url(); ?>";
      var siteurl = "<?php print site_url(); ?>";
      new WOW().init();
    </script>
    
</html>