<div id="view-items-modal" class="modal fade view-items-modal" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">View Items </h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table table-hover table-striped wow fadeIn">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Question</th>
                  <th>Answer #1</th>
                  <th>Answer #2</th>
                  <th>Answer #3</th>
                  <th>Answer #4</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="data in items">
                  <td>{{$index+1}}</td>
                  <td>{{data.exam_question | limitTo:15}}{{data.exam_question.length > 15 ? '...' : ''}}</td>
                  <td>{{data.exam_answer1 | limitTo:15}}{{data.exam_answer1.length > 15 ? '...' : ''}}</td>
                  <td>{{data.exam_answer2 | limitTo:15}}{{data.exam_answer2.length > 15 ? '...' : ''}}</td>
                  <td>{{data.exam_answer3 | limitTo:15}}{{data.exam_answer3.length > 15 ? '...' : ''}}</td>
                  <td>{{data.exam_answer4 | limitTo:15}}{{data.exam_answer4.length > 15 ? '...' : ''}}</td>
                  <td hidden>{{data.id}}</td>
                  <td><button id="view-item-btn" class="btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".view-item-modal"><i class="glyphicon glyphicon-duplicate"></i></button></td>
                  <td><button id="edit-item-btn" class="btn btn-info btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".edit-item-modal"><i class="glyphicon glyphicon-edit"></i></button></td>
                  <td><button id="del-item-btn" class="btn btn-danger btn-sm hvr-wobble-horizontal" ><i class="glyphicon glyphicon-remove"></i></button></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tfoot>  
            </table>
            <br>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->