<div id="open-assignment-modal" class="modal fade open-assignment-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel">Filename.docx</label>
      <?php
        if($this->session->userdata('user_type') == 'instructor_class'){
          echo '<button id="edit-topic-summ" class="btn btn-info btn-sm hvr-icon-rotate" style="margin-left:10px;">Edit</button><button id="cancel-top" class="btn btn-warning btn-sm" style="margin-left:10px;display:none;">Cancel</button>';
        }else{
          echo '<a id="dl-ass" class="btn btn-default" style="padding:0px 6px;margin-left:10px;" download><i class="fa fa-download"></i></a>';
        }
      ?>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
           <div class="row">
            <div class="col-lg-12">
              <div id="content"></div> 
              <div class="edit-content" hidden>
                <div id="content-edit"></div>
                <button id="done-edit-sum" class="btn btn-danger">Done</button>
              </div>
              <div class="no-con"><label style="color:#DB2417;font-weight:700;"><i>Cannot view topic. Pls download file</i></label></div> 
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

