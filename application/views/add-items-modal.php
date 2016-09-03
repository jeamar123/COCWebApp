<div id="add-items-modal" class="modal fade add-items-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="add-item-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel">Exam Items</label><button id="show-opts" style="margin-left:10px;padding:1px 6px;" class="btn btn-default btn-sm"><i class="fa fa-plus"></i></button><button id="hide-opts" style="margin-left:10px;display:none;padding:1px 6px;" class="btn btn-warning btn-sm">Cancel</button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">

          <div id="exam-items-tbl" class="row">
            <div class="col-lg-12">
              <table class="table table-hover table-striped wow fadeIn">
                <thead>
                  <tr >
                    <th>#</th>
                    <th>Question</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="data in items">
                    <td style="width:1%;">{{$index+1}}</td>
                    <td class="col-lg-2">{{data.question  | limitTo:25}}{{data.question.length > 25 ? '...' : ''}}</td>
                    <td hidden>{{data.id}}</td>
                    <td style="width:1%;"><button ng-click="get_item(data.id)" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".open-item-modal"><i class="fa fa-search"></i></button></td>
                    <td style="width:1%;"><button id="delete-exam-item" class="btn btn-danger btn-sm" ><i class="fa fa-remove"></i></button></td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>


          <div id="item-type" class="row" hidden>
            <div class="col-lg-12">
              <div class="item-mc">
                <div class="form-mc">
                  <div class="row">
                    <div class="col-lg-12">
                      <span class="mc-number">1.</span>
                      <button style="float:right;" class="close btn-close mc-close">&times;</button>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <form>
                    <textarea id="question" col="50" rows="3" class="form-control" style="resize:none;" required></textarea>
                    <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="1" required><input id="answer1" type="text" class="form-control" placeholder="Answer 1" required></label></div>
                    <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="2" required><input id="answer2" type="text" class="form-control" placeholder="Answer 2" required></label></div>
                    <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="3" required><input id="answer3" type="text" class="form-control" placeholder="Answer 3" required></label></div>
                    <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="4" required><input id="answer4" type="text" class="form-control" placeholder="Answer 4" required></label></div>
                    </form>
                  </div>
                </div>
                <br>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div id="alert-add-exam-item" class="alert alert-warning wow shake" style="padding:6px;margin-bottom:0px;display:none;"><center><b>Please input all fields !!!</b></center></div>
                </div>
                <div class="col-lg-2" style="width:70px;padding-right:0px;">
                  <input id="mc-num" type="number" class="form-control" min="0" max="10" step="1" value="0" size="" />
                </div>
                <div class="col-lg-2" >
                  <button id="add-mc-item-btn" class="btn btn-warning">Add &nbsp;<i class="fa fa-plus"></i></button>
                </div>
                <div class="col-lg-1">
                  <button id="done-mc-item-btn" class="btn btn-primary hvr-icon-wobble-horizontal">Done</button>
                </div>
              </div>
              <br>
            </div>
            <br>
            <br>
          </div>
          <br>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

