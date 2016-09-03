<div id="add-students-modal" class="modal fade add-students-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Add Student</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <label>Id Number:</label>
                <input id="idnum" class="form-control" type="text">
                <br>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-lg-12">
                <label>Section:</label>
                <select id="sec" name="sec" class="form-control" >
                  <option value="" selected="selected"></option>
                  <option ng-repeat="data in sections">{{data.section}}</option>
                </select>
                <br>
              </div>
            </div> -->
            <div class="row">
              <div class="col-lg-12">
                <label>Full Name:</label>
                <input id="fname" class="form-control" type="text">
                <br>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-lg-12">
                <label>Password:</label>
                <input id="passwd" class="form-control" type="password">
                <br>
              </div>
            </div> -->
            <br>
            <div class="row">
              <div class="col-lg-3">
                <button id="done-add-student-btn" class="btn btn-danger hvr-icon-wobble-horizontal" data-loading-text="Loading" autocomplete="off" type="button">Done</button>
              </div>
              <div class="col-lg-8">
                 <div id="success" class="alert alert-success" role="alert" hidden><b>Student Registered Successfully !</b></div>
                 <div id="error" class="alert alert-danger" role="alert" hidden><b>ERROR !</b> Registration Failed.</div>
                 <div id="error2" class="alert alert-warning" role="alert" hidden>Please Input all fields.</div>
              </div>
            </div>
            <br>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

