<div id="open-quiz-modal" class="modal fade open-quiz-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel">Filename.docx</label><a id="dl-quiz" class="btn btn-default" style="padding:0px 6px;margin-left:10px;" download><i class="fa fa-download"></i></a>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <object width="1000" height="400" data="<?php echo base_url()?>/assets/quizzes/license.txt"></object>
          <br>
          <br>
          
          <div class="row">
            <div class="col-lg-6">
              <?php 
                if($this->session->userdata('user_type') == 'student_class'){
                  echo '<button class="btn btn-primary">Submit Answer</button>';
                }
              ?>
              
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

