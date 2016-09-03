<div id="check-assignment-modal" class="modal fade check-assignment-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label id="gridSystemModalLabel">Answers Uploaded</label>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-hover table-striped wow fadeIn">
                <thead class="">
                  <tr>
                    <!-- <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('0')" value=""></th> -->
                    <th>#</th>
                    <th>Student</th>
                    <th>Date Uploaded</th>
                    <th></th>    
                  </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="data in ass_ans | filter:searchText | filter:FilterSec">
                        <!-- <td style="width:1%;"><input id="sec-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td> -->
                        <td style="width:5%;">{{$index+1}}</td>
                        <td class="col-md-2">{{data.student}}</td>
                        <td class="col-md-2">{{data.date}}</td>
                        <td hidden>{{data.id}}</td>
                        <td style="width:1%;"><button class="btn btn-primary btn-sm hvr-wobble-horizontal"><i class="fa fa-search"></i></button></td>                                  
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <!-- <td> </td> -->
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>
                </tfoot>
              </table>              
              
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

