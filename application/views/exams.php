 

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-11">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Exams</span>
                                    <?php 
                                      if($this->session->userdata('user_type') == 'instructor_class'){
                                        echo '<button id="exam-open" class="btn btn-warning btn-sm hvr-icon-float-away">Add</button>
                                              <button id="exam-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button>
                                              <button id="exam-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button> 
                                          ';
                                      }
                                    ?>
                                    </h1>
                            </div>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-files-o"></i> Exams
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row add-exam-form" hidden>
                  <div class="col-lg-12">
                    <form class="form-inline">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Topic :</label><br>
                        <select id="topic" class="form-control">
                          <option value=""></option>
                          <optgroup label="Category 1">
                            <option value="3">Industrial Security Management</option>
                            <option value="4">Police Intelligence</option>
                            <option value="8">Police Operation and Planning</option>
                            <option value="11">Police Patrol Operations</option>
                            <option value="12">Police Personnel and Records Management</option>
                          </optgroup>
                          <optgroup label="Category 2">
                            <option value="13">Criminology and Psychology of Crimes</option>
                            <option value="14">Juvenile Deliquency and Crime Prevention</option>
                            <option value="15">Philippine Criminal Justice System</option>
                          </optgroup>
                          <optgroup label="Category 3">
                            <option value="16">Correction and Criminal Justice System</option>
                            <option value="17">Non-Institutional Correction</option>
                          </optgroup>
                          <optgroup label="Category 4">
                            <option value="18">Fire Prevention and Arson Investigation</option>
                            <option value="19">Fundamentals of Criminal Investigation</option>
                            <option value="20">Organized Crime</option>
                            <option value="21">Special Crime Investigation</option>
                            <option value="22">Study of Vices and Control</option> 
                            <option value="23">Traffic Management and Accident Prevention</option>
                          </optgroup>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Exam Name :</label><br>
                        <input id="exam-name" type="text" class="form-control">
                        <button id="done-select-chapter-btn" class="btn btn-danger ">Done</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="slideform row edit-exam-form" hidden>
                  <div class="col-lg-12">
                    <form class="form-inline">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Topic :</label><br>
                        <select id="topic" class="form-control">
                          <option value=""></option>
                          <optgroup label="Category 1">
                            <option value="3">Industrial Security Management</option>
                            <option value="4">Police Intelligence</option>
                            <option value="8">Police Operation and Planning</option>
                            <option value="11">Police Patrol Operations</option>
                            <option value="12">Police Personnel and Records Management</option>
                          </optgroup>
                          <optgroup label="Category 2">
                            <option value="13">Criminology and Psychology of Crimes</option>
                            <option value="14">Juvenile Deliquency and Crime Prevention</option>
                            <option value="15">Philippine Criminal Justice System</option>
                          </optgroup>
                          <optgroup label="Category 3">
                            <option value="16">Correction and Criminal Justice System</option>
                            <option value="17">Non-Institutional Correction</option>
                          </optgroup>
                          <optgroup label="Category 4">
                            <option value="18">Fire Prevention and Arson Investigation</option>
                            <option value="19">Fundamentals of Criminal Investigation</option>
                            <option value="20">Organized Crime</option>
                            <option value="21">Special Crime Investigation</option>
                            <option value="22">Study of Vices and Control</option> 
                            <option value="23">Traffic Management and Accident Prevention</option>
                          </optgroup> 
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Exam Name :</label><br>
                        <input id="exam-name" type="text" class="form-control">
                        <button id="done-edit-exam-btn" class="btn btn-danger ">Done</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-hover table-striped wow fadeIn">
                          <thead>
                              <tr>
                                  <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('3')" value=""></th>
                                  <th>#</th>
                                  <th>Topic</th>
                                  <th>Exam</th>
                                  <th>Timer</th>
                                  <th>Status</th>
                                  <th></th>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo ' <th>  </th>';
                                     }
                                  ?>
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in exams">
                                  <td style="width:1%;"><input id="exam-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox(data.id)" name="check-id" value="{{data.id}}"></td>
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <td class="col-md-2">{{data.topic}}</td>
                                  <td class="col-md-2">{{data.exam}}</td>
                                  <td class="col-md-1">{{data.exam_timer}}</td>
                                  <td class="col-md-1">{{data.status}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <td hidden>{{data.topic_no}}</td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<td style="width:1%;"><button id="add-items" ng-click="get_items(data.id)" class="btn btn-primary btn-sm hvr-wobble-horizontal " data-toggle="modal" data-target=".add-items-modal"><i class="fa fa-search"></i></button></td>';
                                      echo '<td style="width:1%;"><button id="add-timer-btn" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".time-limit-modal"><i class="fa fa-cog"></i> </button></td>';
                                    }else{
                                      echo '<td style="width:1%;"><button id="take-exam" class="btn btn-primary btn-sm hvr-wobble-horizontal " data-toggle="modal" data-target=".take-exam-modal" ><i class="fa fa-arrow-circle-right"></i></button></td>';
                                    }
                                  ?>
                                  
                                  
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td > </td>
                                  <td > </td>
                                  <td > </td>
                                  <td > </td>
                                  <td > </td>
                                  <td> </td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo ' <td>  </td>';
                                     }
                                  ?>
                              </tr>
                          </tfoot>
                        </table>
                    </div>
                </div>
                <?php
                  include APPPATH.'views/add-items-modal.php';
                  include APPPATH.'views/open-item-modal.php';
                  include APPPATH.'views/take-exam-modal.php';
                  include APPPATH.'views/time-limit-modal.php';
                  include APPPATH.'views/delete-modal.php';
                ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   