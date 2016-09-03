<div id="open-classes-modal" class="modal fade open-classes-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel"></label>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <label>Students :</label>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <table id="cla-tbl" class="table table-hover table-striped wow fadeIn">
                <thead class="">
                  <tr>
                    <!-- <th class="col-md-1 chkbox"><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('x')" value=""></th> -->
                    <th>#</th>
                    <th>Id Number</th>
                    <th>Full name</th>
                    <?php
                      if($this->session->userdata('user_type') == 'admin'){
                        echo '<th><button id="cla-add-student" class="btn btn-default btn-sm hvr-icon-float-away">Add</button></th>';
                      }
                    ?>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="data in students_by_class | filter:searchText | filter:FilterSec">
                    <!-- <td class="col-md-1 chkbox" ><input id="ins-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.session_no}}')" name="check-id" value="{{data.session_no}}"></td> -->
                    <td style="width:5%;">{{$index+1}}</td>
                    <td class="col-md-2">{{data.id_number}}</td>
                    <td class="col-md-2">{{data.name}}</td>
                    <td hidden>{{data.id}}</td>
                    <td hidden>{{data.student_no}}</td>
                    <?php
                      if($this->session->userdata('user_type') == 'admin'){
                        echo '<td style="width:5%;"><button id="cla-del-student" class="btn btn-danger btn-sm hvr-icon-sink-away">Remove</button></td>';
                      }
                    ?>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <!-- <td class="col-md-1"> </td> -->
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php
                      if($this->session->userdata('user_type') == 'admin'){
                        echo '<td></td>';
                      }
                    ?>
                    
                  </tr>
                </tfoot>
              </table>
              <form class="form-inline cla-add-std-form" hidden>
                <div class="form-group">
                  <label for="exampleInputPassword3">Add Student</label><br>
                  <select id="std" class="form-control">
                    <option value="" selected></option>
                    <option ng-repeat="data in students" value="{{data.id}}">{{data.name}}</option>
                  </select>
                  <button id="done-add-cla-std-btn" class="btn btn-warning ">Done</button>
                </div>
              </form>

              <form class="form-inline cla-del-std-form" hidden>
                <div class="form-group">
                  <label for="exampleInputPassword3">Are you sure you want to remove student ?</label><br><br>
                  <button id="delete-confirm-btn" class="btn btn-success ">Yes</button>
                  <button id="cla-del-student" class="btn btn-warning ">No</button>
                </div>
              </form>
            </div>
          </div>
          <br>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

