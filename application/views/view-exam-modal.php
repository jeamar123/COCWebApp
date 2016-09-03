<div id="view-exam-modal" class="modal fade view-exam-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel">Evaluation</label>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div ng-repeat="data in progress_items">
            <div class="questionnaires">
              <div class="row">
                <div class="col-lg-11">
                 <label>{{data.question}}</label>
                </div>
              </div>
              <div class="radio">
                <div ng-if="data.ans == 1 && data.answer == 1 ">
                  <label style="color:green;">
                    {{data.answer1}} <i class="glyphicon glyphicon-ok-sign"></i>
                  </label>
                </div>
                <div ng-if="data.ans != 1 && data.answer == 1 ">
                  <label style="color:blue;">
                    {{data.answer1}}
                  </label>
                </div>
                <div ng-if="data.ans == 1 && data.answer != 1 ">
                  <label style="color:red;">
                    {{data.answer1}} <i class="glyphicon glyphicon-remove-sign"></i>
                  </label>
                </div>
                <div ng-if="data.ans != 1 && data.answer != 1 ">
                  <label>
                    {{data.answer1}}
                  </label>
                </div>
              </div>
              <div class="radio">
                <div ng-if="data.ans == 2 && data.answer == 2 ">
                  <label style="color:green;">
                    {{data.answer2}} <i class="glyphicon glyphicon-ok-sign"></i>
                  </label>
                </div>
                <div ng-if="data.ans != 2 && data.answer == 2 ">
                  <label style="color:blue;">
                    {{data.answer2}}
                  </label>
                </div>
                <div ng-if="data.ans == 2 && data.answer != 2 ">
                  <label style="color:red;">
                    {{data.answer2}} <i class="glyphicon glyphicon-remove-sign"></i>
                  </label>
                </div>
                <div ng-if="data.ans != 2 && data.answer != 2 ">
                  <label>
                    {{data.answer2}}
                  </label>
                </div>
              </div>
              <div class="radio">
                <div ng-if="data.ans == 3 && data.answer == 3 ">
                  <label style="color:green;">
                    {{data.answer3}} <i class="glyphicon glyphicon-ok-sign"></i>
                  </label>
                </div>
                <div ng-if="data.ans != 3 && data.answer == 3 ">
                  <label style="color:blue;">
                    {{data.answer3}}
                  </label>
                </div>
                <div ng-if="data.ans == 3 && data.answer != 3 ">
                  <label style="color:red;">
                    {{data.answer3}} <i class="glyphicon glyphicon-remove-sign"></i>
                  </label>
                </div>
                <div ng-if="data.ans != 3 && data.answer != 3 ">
                  <label>
                    {{data.answer3}}
                  </label>
                </div>
              </div>
              <div class="radio">
                <div ng-if="data.ans == 4 && data.answer == 4 ">
                  <label style="color:green;">
                    {{data.answer4}} <i class="glyphicon glyphicon-ok-sign"></i>
                  </label>
                </div>
                <div ng-if="data.ans != 4 && data.answer == 4 ">
                  <label style="color:blue;">
                    {{data.answer4}}
                  </label>
                </div>
                <div ng-if="data.ans == 4 && data.answer != 4 ">
                  <label style="color:red;">
                    {{data.answer4}} <i class="glyphicon glyphicon-remove-sign"></i>
                  </label>
                </div>
                <div ng-if="data.ans != 4 && data.answer != 4 ">
                  <label>
                    {{data.answer4}}
                  </label>
                </div>
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->