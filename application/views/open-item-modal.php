<div id="open-item-modal" class="modal fade open-item-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel">View Item</label><button id="show-edit" style="margin-left:10px;padding:1px 6px;" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></button><button id="hide-edit" style="margin-left:10px;display:none;padding:1px 6px;" class="btn btn-warning btn-sm">Cancel</button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="item-view">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-11">
                   <label id="exam_question"></label>
                  </div>
                </div>
                <div class="radio">
                  <label id="exam_answer1">
                  </label>
                </div>
                <div class="radio">
                  <label id="exam_answer2">
                  </label>
                </div>
                <div class="radio">
                  <label id="exam_answer3">
                  </label>
                </div>
                <div class="radio">
                  <label id="exam_answer4">
                  </label>
                </div>
              </div>
            </div>
            <div class="item-edit" hidden>
              <div class="col-lg-12">
                <textarea id="edit-item-question" col="50" rows="3" class="form-control" style="resize:none;" ></textarea>
                <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="1"><input id="edit-item-answer1" type="text" class="form-control" placeholder="Answer 1"></label></div>
                <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="2"><input id="edit-item-answer2" type="text" class="form-control" placeholder="Answer 2"></label></div>
                <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="3"><input id="edit-item-answer3" type="text" class="form-control" placeholder="Answer 3"></label></div>
                <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="4"><input id="edit-item-answer4" type="text" class="form-control" placeholder="Answer 4"></label></div>
              </div>
              <div class="col-lg-4">
              <br>
                <button id="done-edit-item" class="btn btn-danger">Done</button>
              </div>
            </div>
            <br>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

