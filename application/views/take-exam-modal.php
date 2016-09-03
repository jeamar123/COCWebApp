<div id="take-exam-modal" class="modal fade take-exam-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel"><span id="tk-exam">Take Exam</span><span id="al-exam" hidden>Exam Already Taken</span></hlabel>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div id="exam_taken" hidden>
            <div class="row" style="text-align:center;">
              <div class="col-lg-12">
                <div class="loading-spinner" style="margin:0 auto;display:none;"></div>
                Items : <label><span id="items"> 10 / 10</span></label>
              </div>
              <div class="col-lg-12">
                Rating : <label><span id="rating"> 8 / 10</span></label>
              </div>
              <div class="col-lg-12">
                Evaluation : <label><span id="eval"> Passed</span></label>
              </div>  
            </div>
          </div>
          <div id="exam_take">
            <div class="row" style="text-align:center;">
              <div class="col-lg-2" ></div>
              <div class="col-lg-4" >
                <a href="<?php echo site_url('default_con/index/take_exam'); ?>" id="take-exam-confirm-btn" class="btn btn-primary" data-loading-text="Loading" autocomplete="off" type="button">Yes</a>
              </div>
              <div class="col-lg-4">
                <button id="btn" class="btn btn-warning" data-dismiss="modal" data-loading-text="Loading" autocomplete="off" type="button">No</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->