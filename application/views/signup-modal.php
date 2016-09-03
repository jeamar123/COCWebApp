<div id="signup-modal" class="modal fade signup-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Add Instructor</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form>
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" id="fname" placeholder="Full Name" required>
            </div>
            <div class="form-group">
              <label>Login name</label>
              <input type="text" class="form-control" id="uname" placeholder="Login name" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="pass" placeholder="Password" required>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <button id="signup-btn" class="btn btn-danger hvr-icon-wobble-horizontal" data-loading-text="Loading" autocomplete="off" type="button">Register</button>
              </div>
              <div class="col-lg-1"></div>
              <div class="col-lg-9">
                <div id="success" class="alert alert-success" role="alert" hidden><b>Registration Successful !</b></div>
                <div id="user" class="alert alert-warning" role="alert" hidden><b>Sorry !</b> Username is already taken. </div>
                <div id="passwd" class="alert alert-warning" role="alert" hidden><b>Password</b> must contain 6 characters. </div>
                <div id="error" class="alert alert-danger" role="alert" hidden><b>ERROR !</b> Account already registered.</div>
                <div id="error2" class="alert alert-danger" role="alert" hidden><b>ERROR !</b> Registration Failed.</div>
                <div id="error3" class="alert alert-danger" role="alert" hidden><b>ERROR !</b> Inputs should only contain [a-z,A-Z,0-9,@,.] characters.</div>
              </div>
            </div>
            <br>
            </form>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->