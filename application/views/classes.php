

        <div id="page-wrapper" >

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Classes</span>
                                    <?php
                                      if($this->session->userdata('user_type') == 'admin'){
                                        echo '<button id="cla-opt-add" class="btn btn-warning btn-sm hvr-icon-float-away" data-toggle="modal" data-target=".add-students-modal" >Add</button>
                                              <button id="cla-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button>
                                              <button id="cla-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button>';
                                      }
                                    ?>
                                     
                                </h1>
                            </div>
                            
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label><h4>Search:</h4></label>
                                    <input class="form-control" type="text" placeholder="Search" ng-model="searchText">
                                </div>
                            </div>
                            <!-- <div class="col-lg-2">
                                <div class="form-group">
                                    <label><h4>Section:</h4></label> 
                                    <select class="form-control" ng-model="FilterSec">
                                        <option value="">ALL</option>
                                        <option ng-repeat="data in sections">{{data.section}}</option>
                                    </select>
                                </div>
                            </div> -->
                            
                        </div>
                        <ol class="breadcrumb ">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-child"></i> Classes
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row slideform" id="class-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Instructor</label><br>
                                <!-- <input type="text" class="form-control" id="sec"> -->
                                <!-- <button id="done-add-sec-btn" class="btn btn-danger ">Done</button> -->
                                <select id="ins" class="form-control">
                                  <option value="" selected="selected"></option>
                                  <option ng-repeat="data in instructors" value="{{data.id}}">{{data.name}}</option>
                                </select>
                              </div>
                              <!-- <div class="form-group">
                                <label for="exampleInputPassword3">Section</label><br>
                                --> <!-- <input type="text" class="form-control" id="sec"> -->
                                <!-- <button id="done-add-sec-btn" class="btn btn-danger ">Done</button> -->
                                <!-- <select id="sec" class="form-control"> -->
                                  <!-- <option value="" selected="selected"></option> -->
                                  <!-- <option ng-repeat="data in sections" value="{{data.id}}">{{data.section}}</option> -->
                                <!-- </select> -->
                              <!-- </div> -->
                              <div class="form-group">
                                <label for="exampleInputPassword3">Subject</label><br>
                                <!-- <input type="text" class="form-control" id="sec"> -->
                                <select id="subj" class="form-control">
                                  <option value="" selected="selected"></option>
                                  <option ng-repeat="data in subjects" value="{{data.id}}">{{data.subject}}</option>
                                </select>
                                <button id="done-add-cla-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                        <div class="row slideform" id="edit-class-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Instructor</label><br>
                                <!-- <input type="text" class="form-control" id="sec"> -->
                                <!-- <button id="done-add-sec-btn" class="btn btn-danger ">Done</button> -->
                                <select id="ins" class="form-control">
                                  <option value="" selected="selected"></option>
                                  <option ng-repeat="data in instructors" value="{{data.id}}">{{data.name}}</option>
                                </select>
                              </div>
                              <!-- <div class="form-group">
                                <label for="exampleInputPassword3">Section</label><br> -->
                                <!-- <input type="text" class="form-control" id="sec"> -->
                                <!-- <button id="done-add-sec-btn" class="btn btn-danger ">Done</button> -->
                                <!-- <select id="sec" class="form-control">
                                  <option value="" selected="selected"></option>
                                  <option ng-repeat="data in sections" value="{{data.id}}">{{data.section}}</option>
                                </select>
                              </div> -->
                              <div class="form-group">
                                <label for="exampleInputPassword3">Subject</label><br>
                                <!-- <input type="text" class="form-control" id="sec"> -->
                                <select id="subj" class="form-control">
                                  <option value="" selected="selected"></option>
                                  <option ng-repeat="data in subjects" value="{{data.id}}">{{data.subject}}</option>
                                </select>
                                <button id="done-edit-cla-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table id="sections-tbl" class="table table-hover table-striped wow fadeIn">
                          <thead class="">
                              <tr>
                                  <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('0')" value=""></th>
                                  <th>#</th>
                                  <!-- <th>Section</th> -->
                                  <th>Subject</th>
                                  <?php
                                    if($this->session->userdata('user_type') == 'admin'){
                                      echo '<th class="col-md-1">Instructor</th>';
                                    }
                                  ?>
                                  <th>no. of students</th>
                                  <th></th>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor'){
                                      echo '<th></th>';  
                                    }
                                  ?>
                                  
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in classe | filter:searchText | filter:FilterSec">
                                  <td style="width:1%;"><input id="sec-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td>
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <!-- <td class="col-md-2">{{data.section}}</td> -->
                                  <td class="col-md-2">{{data.subject}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <td hidden>{{data.section_no}}</td>
                                  <td hidden>{{data.subject_no}}</td>
                                  <td hidden>{{data.instructor_no}}</td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'admin'){
                                      echo '<td class="col-md-2">{{data.name}}</td>';
                                    }
                                  ?>
                                  <td class="col-md-2">{{data.no_students}}</td>
                                  <td style="width:1%;"><button ng-click="open_classes(data.id,data.subject,data.section,data.instructor_no);" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".open-classes-modal"><i class="glyphicon glyphicon-search"></i></button></td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor'){
                                      echo '<td style="width:1%;"><button ng-click="open_classes(data.id,data.subject,data.section,data.instructor_no);" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".open-classes-modal"><i class="glyphicon glyphicon-chevron-right"></i></button></td>';
                                    }
                                  ?>
                                </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td > </td>
                                  <!-- <td> </td> -->
                                  <td> </td>
                                  <td> </td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'admin'){
                                      echo '<td class="col-md-2"> </td>';
                                    }
                                  ?>
                                  <td> </td>
                                  <td> </td>
                                   <?php
                                    if($this->session->userdata('user_type') == 'instructor'){
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
                  include APPPATH.'views/open-classes-modal.php';
                ?>
            </div>

        </div>
   