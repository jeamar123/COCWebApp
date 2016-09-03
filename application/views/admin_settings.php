

        <div id="page-wrapper" >

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Admin Settings</span>
                                </h1>
                            </div>
                        </div>
                        <ol class="breadcrumb ">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-child"></i> Settings
                            </li>
                        </ol>
                    </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-3">
                    <form>
                      <div class="form-group">
                        <label>Username :</label> 
                        
                        <input id="admin-uname" type="text" class="form-control" value="" required>
                      </div>
                      <div class="form-group">
                        <label>Password :</label>  
                        <input id="admin-pass" type="password" class="form-control" value="" required><br>
                        
                        <button id="update-admin-btn" class="btn btn-primary hvr-icon-wobble-horizontal">Update</button><br><br> 
                        <div id="success" class="alert alert-success" role="alert" hidden><b>Successfully Updated !</b></div> 
                        <div id="error" class="alert alert-danger" role="alert" hidden><b>ERROR !</b> Update Failed.</div>  
                      </div>
                    </form>
                  </div>
                </div>
            </div>


        </div>
   