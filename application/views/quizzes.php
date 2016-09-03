

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Quizzes</span>
                                    <?php 
                                      if($this->session->userdata('user_type') == 'instructor_class'){
                                        echo '<button id="quiz-opt-add" class="btn btn-warning btn-sm hvr-icon-float-away" data-toggle="modal" data-target=".add-students-modal" >Add</button>
                                              <button id="quiz-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button>
                                              <button id="quiz-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button> 
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
                                <i class="fa fa-child"></i> Quizzes
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row slideform" id="quiz-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Add Quiz</label><br>
                                <input type="file" class="form-control" id="userfile">
                                <button id="done-add-quiz-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table id="quiz-tbl" class="table table-hover table-striped wow fadeIn">
                          <thead class="">
                              <tr>
                                  <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('quiz')" value=""></th>
                                  <th>#</th>
                                  <th>Quiz</th>
                                  <th>Date</th>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<th></th>';
                                    }
                                  ?>

                                  <?php 
                                    if($this->session->userdata('user_type') == 'student_class'){
                                      echo '<th></th>';
                                    }
                                  ?>
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in quizzes | filter:searchText | filter:FilterSec">
                                  <td style="width:1%;"><input id="sec-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td>
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <td class="col-md-2">{{data.quiz}}</td>
                                  <td class="col-md-2">{{data.date}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <td style="width:1%;"><button id="open-quiz-btn" class="btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".open-quiz-modal"><i class="fa fa-search"></i></button></td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<td style="width:1%;"><button class="up-quiz-btn btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".check-quiz-modal" ng-click="get_uploaded_quiz()"><i class="fa fa-arrow-circle-right"></i></button></td>';
                                    }
                                  ?>
                                  <?php 
                                    if($this->session->userdata('user_type') == 'student_class'){
                                      echo '<td style="width:1%;"><button class="up-quiz-btn btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".upload-quiz-modal"><i class="fa fa-upload"></i></button></td>';
                                    }
                                  ?>

                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<td></td>';
                                    }
                                  ?>
                                  <?php 
                                    if($this->session->userdata('user_type') == 'student_class'){
                                      echo '<td></td>';
                                    }
                                  ?>
                              </tr>
                          </tfoot>
                        </table>

                        
                    </div>
                </div>

                <?php
                  include APPPATH.'views/open-quiz-modal.php';
                  include APPPATH.'views/check-quiz-modal.php';
                  include APPPATH.'views/upload-quiz-modal.php';
                  include APPPATH.'views/delete-modal.php';
                ?>
            </div>

        </div>
   