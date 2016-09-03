

        <div id="page-wrapper" >

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Instructors</span>
                                    <button id="add-ins-open" class="btn btn-warning btn-sm hvr-icon-float-away" data-toggle="modal" data-target=".signup-modal" >Add</button>
                                    <button id="ins-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button>
                                    <button id="ins-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button> 
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
                                <i class="fa fa-child"></i> instructors
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row slideform" id="edit-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <!-- <div class="form-group">
                                <label for="exampleInputEmail3">Id Number</label><br>
                                <input type="text" class="form-control" id="idnum">
                              </div> -->
                              <div class="form-group">
                                <label for="exampleInputEmail3">Full Name</label><br>
                                <input type="text" class="form-control" id="fname">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail3">Login name</label><br>
                                <input type="text" class="form-control" id="unum">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword3">Password</label><br>
                                <input type="text" class="form-control" id="pass">
                                <button id="ins-done-edit-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table id="ins-tbl" class="table table-hover table-striped wow fadeIn">
                          <thead class="">
                              <tr>
                                  <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('x')" value=""></th>
                                  <th>#</th>
                                  <th>Full Name</th>
                                  <th>Login Name</th>
                                  <!-- <th class="col-md-2">Section</th> -->
                                  <!-- <th>  </th> -->
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in instructors | filter:searchText | filter:FilterSec">
                                  <td style="width:1%;"><input id="ins-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.session_no}}')" name="check-id" value="{{data.session_no}}"></td>
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <td class="col-md-2">{{data.name}}</td>
                                  <td class="col-md-2">{{data.username}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <td hidden>{{data.password}}</td>
                                  <td hidden>{{data.session_no}}</td>
                                  <td style="width:1%;"><button ng-click="open_instructors(data.id,data.session_no,data.name);" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".open-instructor-modal"><i class="glyphicon glyphicon-search"></i></button></td>
                                  <!-- <td hidden>{{data.id_number}}</td> -->
                                  <!-- <td class="row-btn"><button ng-click="get_eval(data.id,data.id_num,data.name,data.section);get_progress(data.id)" class="btn btn-primary btn-sm row-open-btn hvr-wobble-horizontal" id="eval-btn" data-toggle="modal" data-target=".progress-modal" >Evaluation</button></td> -->
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                              </tr>
                          </tfoot>
                        </table>

                        
                    </div>
                </div>
                <?php
                  include APPPATH.'views/open-instructor-modal.php';
                  include APPPATH.'views/signup-modal.php';
                  include APPPATH.'views/delete-modal.php';
                ?>
            </div>

        </div>
   