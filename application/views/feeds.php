

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Feeds</span>
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
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Admin</a>
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
                                <button id="done-edit-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                        <div class="row slideform" id="edit-admin-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputEmail3">Username</label><br>
                                <input type="text" class="form-control" id="aname">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword3">Password</label><br>
                                <input type="text" class="form-control" id="apass">
                                <button id="done-edit-admin-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table id="ins-tbl" class="table table-hover table-striped wow fadeIn">
                          <thead class="">
                              <tr>
                                  <th class="col-md-1 chkbox"><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('x')" value=""></th>
                                  <th class="col-md-1">#</th>
                                  <th class="col-md-3">Full Name</th>
                                  <th class="col-md-3">Login Name</th>
                                  <!-- <th class="col-md-2">Section</th> -->
                                  <!-- <th>  </th> -->
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in instructors | filter:searchText | filter:FilterSec">
                                  <td class="col-md-1 chkbox"><input id="ins-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td>
                                  <td class="col-md-1">{{$index+1}}</td>
                                  <td class="col-md-3">{{data.name}}</td>
                                  <td class="col-md-3">{{data.username}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <td hidden>{{data.password}}</td>
                                  <!-- <td class="row-btn"><button ng-click="get_eval(data.id,data.id_num,data.name,data.section);get_progress(data.id)" class="btn btn-primary btn-sm row-open-btn hvr-wobble-horizontal" id="eval-btn" data-toggle="modal" data-target=".progress-modal" >Evaluation</button></td> -->
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td class="col-md-1"> </td>
                                  <td class="col-md-1"> </td>
                                  <td class="col-md-3"> </td>
                                  <td class="col-md-2"> </td>
                                  <!-- <td class="col-md-3"> </td> -->
                              </tr>
                          </tfoot>
                        </table>

                        
                    </div>
                </div>

                <?php
                  include APPPATH.'views/delete-modal.php';
                ?>
                <?php
                  include APPPATH.'views/signup-modal.php';
                ?>
            </div>

        </div>
   