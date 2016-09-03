<div id="open-instructor-modal" class="modal fade open-instructor-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label>Instructor Name : </label> <label class="modal-title" id="gridSystemModalLabel"></label>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12"><label>Classes :</label></div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-12">
              <table id="cla-tbl" class="table table-hover table-striped wow fadeIn">
                <thead class="">
                  <tr>
                    <!-- <th class="col-md-1 chkbox"><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('x')" value=""></th> -->
                    <th>#</th>
                    <!-- <th>Section</th> -->
                    <th>Subject</th>
                    <th>no. of students</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="data in classes_by_ins | filter:searchText | filter:FilterSec">
                    <!-- <td class="col-md-1 chkbox" ><input id="ins-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.session_no}}')" name="check-id" value="{{data.session_no}}"></td> -->
                    <td style="width:5%;">{{$index+1}}</td>
                    <td hidden>{{data.section}}</td>
                    <td class="col-md-2">{{data.subject}}</td>
                    <td hidden>{{data.id}}</td>
                    <td class="col-md-2">{{data.no_students}}</td>
                    <!-- <td class="col-md-1"><button ng-click="open_instructors(data.id,data.session_no,data.name);" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".open-instructor-modal"><i class="glyphicon glyphicon-search"></i></button></td> -->
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td> </td>
                    <td> </td>
                    <!-- <td> </td> -->
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

