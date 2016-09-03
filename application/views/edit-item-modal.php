<div id="edit-item-modal" class="modal fade edit-item-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Edit Item</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="questionnaires">
              <textarea id="question" col="50" rows="3" class="form-control" style="resize:none;" ></textarea>
              <div class="radio">
                <label style="width:100%">
                  <input type="radio" name="correct-ans" id="optionsRadios2" value="1">
                  <input id="answer1" type="text" class="form-control" placeholder="Answer 1">
                </label>
              </div>
              <div class="radio">
                <label style="width:100%">
                  <input type="radio" name="correct-ans" id="optionsRadios2" value="2">
                  <input id="answer2" type="text" class="form-control" placeholder="Answer 2">
                </label>
              </div>
              <div class="radio">
                <label style="width:100%">
                  <input type="radio" name="correct-ans" id="optionsRadios2" value="3">
                  <input id="answer3" type="text" class="form-control" placeholder="Answer 3">
                </label>
              </div>
              <div class="radio">
                <label style="width:100%">
                  <input type="radio" name="correct-ans" id="optionsRadios2" value="4">
                  <input id="answer4" type="text" class="form-control" placeholder="Answer 4">
                </label>
              </div>
            </div>
            <br>
            <button id="done-edit-item-btn" class="btn btn-info pull-right" data-dismiss="modal" data-loading-text="Loading" autocomplete="off">Update</button>
            <br>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->