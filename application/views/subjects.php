

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Subjects</span>
                                    <button id="sub-opt-add" class="btn btn-warning btn-sm hvr-icon-float-away">Add</button>
                                    <button id="sub-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button>
                                    <button id="sub-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button> 
                                </h1>
                            </div>
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label><h4>Search:</h4></label>
                                    <input class="form-control" type="text" placeholder="Search" ng-model="searchText">
                                </div>
                            </div>
                            
                        </div>
                        <ol class="breadcrumb ">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-child"></i> Subjects
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row slideform" id="subject-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Add Subject:</label><br>
                                <input type="text" class="form-control" id="subj">
                                <button id="done-add-sub-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                        <div class="row slideform" id="edit-subject-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Edit Subject</label><br>
                                <input type="text" class="form-control" id="subj">
                                <button id="done-edit-sub-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table id="students-tbl" class="table table-hover table-striped wow fadeIn">
                          <thead class="">
                              <tr>
                                  <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('1')" value=""></th>
                                  <th>#</th>
                                  <th>Subject</th>
                                  <!-- <th>  </th> -->
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in subjects | filter:searchText | filter:FilterSec">
                                  <td style="width:1%;"><input id="stud-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td>
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <td class="col-md-2">{{data.subject}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <!-- <td class="row-btn"><button ng-click="get_eval(data.id,data.id_num,data.name,data.section);get_progress(data.id)" class="btn btn-primary btn-sm row-open-btn hvr-wobble-horizontal" id="eval-btn" data-toggle="modal" data-target=".progress-modal" >Evaluation</button></td> -->
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                              </tr>
                          </tfoot>
                        </table>
                       
                        
                    </div>
                </div>
                 
                <?php
                  include APPPATH.'views/progress-modal.php';
                ?>
                <?php
                  include APPPATH.'views/delete-modal.php';
                ?>
                <?php
                  include APPPATH.'views/add-students-modal.php';
                ?>
            </div>

        </div>
   