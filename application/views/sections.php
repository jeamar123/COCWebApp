

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Sections</span>
                                    <button id="sec-opt-add" class="btn btn-warning btn-sm hvr-icon-float-away" data-toggle="modal" data-target=".add-students-modal" >Add</button>
                                    <button id="sec-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button>
                                    <button id="sec-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button> 
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
                                <i class="fa fa-child"></i> Sections
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row slideform" id="sections-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Add Section:</label><br>
                                <input type="text" class="form-control" id="sec">
                                <button id="done-add-sec-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                        <div class="row slideform" id="edit-sections-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Edit Class</label><br>
                                <input type="text" class="form-control" id="sec">
                                <button id="done-edit-sec-btn" class="btn btn-danger ">Done</button>
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
                                  <th>Section</th>
                                  <th>no. of students</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in sections | filter:searchText | filter:FilterSec">
                                  <td style="width:1%;"><input id="sec-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td>
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <td class="col-md-2">{{data.section}}</td>
                                  <td class="col-md-2">{{data.no_students}}</td>
                                  <!-- <td class="col-md-2" ng-if="data.passcode != '' "><i class="glyphicon glyphicon-ok"></i></td>
                                  <td class="col-md-2" ng-if="data.passcode == '' "><i class="glyphicon glyphicon-remove"></i></td>
                                   -->
                                  <td hidden>{{data.id}}</td>
                                  <!-- <td class="row-btn col-md-2"><button class="btn btn-primary btn-sm row-open-btn hvr-wobble-horizontal" id="passcode-btn" data-toggle="modal" data-target=".passcode-modal" >Assign Passcode</button></td>
                                  <td class="row-btn col-md-2"><button class="btn btn-warning btn-sm row-open-btn hvr-wobble-horizontal" id="rem-passcode-btn" >Remove Passcode</button></td>
                               --></tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td><!-- 
                                  <td class="col-md-2"> </td>
                                  <td class="col-md-2"> </td>
                                  <td class="col-md-2"> </td> -->
                              </tr>
                          </tfoot>
                        </table>

                        
                    </div>
                </div>

                <?php
                  include APPPATH.'views/passcode-modal.php';
                ?>
                <?php
                  include APPPATH.'views/delete-modal.php';
                ?>
            </div>

        </div>
   