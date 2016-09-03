

        <div id="page-wrapper" >

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Assignments</span>
                                    <?php 
                                      if($this->session->userdata('user_type') == 'instructor_class'){
                                        echo '<button id="ass-opt-add" class="btn btn-warning btn-sm hvr-icon-float-away" data-toggle="modal" data-target=".add-assignment-modal" >Add</button>
                                              <!-- <button id="ass-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button> -->
                                              <button id="ass-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button> 
                                        ';
                                      }
                                    ?>
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
                                <i class="fa fa-child"></i> Assignments
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- <div class="row slideform" id="ass-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Add Assignment</label><br>
                                <input type="file" class="form-control" id="userfile">
                                <button id="done-add-ass-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div> -->

                <div class="row">
                    <div class="col-lg-12">
                        <table id="ass-tbl" class="table table-hover table-striped wow fadeIn">
                          <thead class="">
                              <tr>
                                  <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('0')" value=""></th>
                                  <th>#</th>
                                  <th>Assignment</th>
                                  <th>Date Posted</th>
                                  <th></th>
                                  <?php 
                                    if($this->session->userdata('user_type') == 'student_class'){
                                      echo '<th></th>';
                                    }
                                  ?>
                                  <?php 
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<th></th>';
                                    }
                                  ?>
                                  
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in assignments | filter:searchText | filter:FilterSec">
                                  <td style="width:1%;"><input id="sec-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td>
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <td class="col-md-2">{{data.assignment}}</td>
                                  <td class="col-md-2">{{data.date}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <td style="width:1%;"><button id="open-ass-btn" class="btn btn-primary btn-sm row-open-btn hvr-wobble-horizontal" data-toggle="modal" data-target=".open-assignment-modal"><i class="fa fa-search"></i></button></td>
                                  <?php 
                                    if($this->session->userdata('user_type') == 'student_class'){
                                      echo '<td style="width:1%;"><button class="up-ass-btn btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".upload-assignment-modal"><i class="fa fa-upload"></i></button></td>';
                                    }
                                  ?>
                                  <?php 
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<td style="width:1%;"><button class="up-ass-btn btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".check-assignment-modal" ng-click="get_uploaded_ass()"><i class="fa fa-arrow-circle-right"></i></button></td>';
                                    }
                                  ?>
                                  
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                                  <?php 
                                    if($this->session->userdata('user_type') == 'student_class'){
                                      echo '<td></td>';
                                    }
                                  ?>
                                  <?php 
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<td></td>';
                                    }
                                  ?>
                              </tr>
                          </tfoot>
                        </table>

                        
                    </div>
                </div>

                <?php
                  include APPPATH.'views/delete-modal.php';
                  include APPPATH.'views/add-assignment-modal.php';
                  include APPPATH.'views/open-assignment-modal.php';
                  include APPPATH.'views/check-assignment-modal.php';
                  include APPPATH.'views/upload-assignment-modal.php';
                ?>
            </div>

        </div>
   