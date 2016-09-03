<div id="time-limit-modal" class="modal fade time-limit-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel">Settings</label><button id="hide-btns" style="margin-left:10px;display:none;padding:1px 6px;" class="btn btn-default btn-sm">Back</button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row sets-btn">
              <div class="col-lg-12">
                <button id="show-stats" class="btn btn-primary">Open/Close Exam</button><br><br>
                <button id="show-tims" class="btn btn-primary">Add Exam Timer</button>
              </div>
            </div>
            <form id="stats" hidden>
              <div class="row">
                <div class="col-lg-12" style="text-align:center;">
                  <h4><b>Exam Status</b></h4>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6" style="text-align:center;">
                  <button id="open-exam" class="btn btn-warning">Open</button>
                </div>
                <div class="col-lg-6" style="text-align:center;">
                  <button id="close-exam" class="btn btn-danger">Close</button>
                </div>
              </div>
            </form>
            <form id="timers" hidden>
            <div class="row">
              <div class="col-lg-12" style="text-align:center;">
                <h4><b>Exam Timer</b></h4>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4" style="text-align:center;">
                <label>Hours</label>
              </div>
              <div class="col-lg-4" style="text-align:center;">
                <label>Minutes</label>
              </div>
              <div class="col-lg-4" style="text-align:center;">
                <label>Seconds</label>
              </div>    
            </div>
            <div class="row">
              <div class="col-lg-4">
                <label><input id="hours" type="number" class="form-control" min="0" max="23" step="1" value="0" size="" /></label>
              </div>
              <div class="col-lg-4">
                <label><input id="minutes" type="number" class="form-control" min="0" max="59" step="1" value="0" size="" /></label>
              </div>
              <div class="col-lg-4">
                <label><input id="seconds" type="number" class="form-control" min="0" max="59" step="1" value="0" size="" /></label>
              </div>    
            </div>
            <!-- 
            <input type="button" id="start" value="Start timer" onClick="startCountdown()"/>
            <input type="button" id="end" value="End timer" onClick="endCountdown()"/> -->
            <input type="text" id="note" value="The countdown ended." hidden/>
            <div class="row">
              <div class="col-lg-12" style="text-align:center;">
                <br><button id="assign-timer-btn" class="btn btn-danger hvr-icon-wobble-horizontal" data-loading-text="Loading" autocomplete="off" type="button">Done</button>
              </div>
            </div>
            </form>
         
          <h1 id="clock-placeholder"></h1>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->