

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Topics</span>
                                    <?php 
                                      //if($this->session->userdata('user_type') == 'instructor_class'){
                                        //echo '<button class="btn btn-warning btn-sm hvr-icon-float-away" data-toggle="modal" data-target=".add-topic-modal">Add</button>
                                             // <!--button id="top-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button-->
                                             // <button id="top-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button> 
                                          //';
                                      //}
                                    ?>
                                    </h1>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label><h4>Categories:</h4></label> 
                                    <select class="form-control" ng-model="FilterSec.category">
                                        <option value="">ALL</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
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
                                <i class="fa fa-child"></i> Topics
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                        <!-- <div class="row slideform" id="topic-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="exampleInputPassword3">Add Topic:</label><br>
                                <input id="userfile" type="file" name="userfile" class="topic-file form-control">
                                <button id="done-add-top-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div> -->

                <div class="row">
                    <div class="col-lg-12">
                        <table id="students-tbl" class="table table-hover table-striped wow fadeIn">
                          <thead class="">
                              <tr>
                                  <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('topics')" value=""></th>
                                  <!-- <th>#</th> -->
                                  <!-- <th>Category</th> -->
                                  <th style="text-align:left;">Topics</th>
                                  <th>  </th>
                                  <th>  </th>
                                 
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in topics | filter:searchText | filter:FilterSec">
                                  <td style="width:1%;"><input id="stud-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td>
                                  <!-- <td style="width:1%;">{{$index+1}}</td> -->
                                  <td hidden >{{data.category}}</td>
                                  <td class="col-md-2" style="text-align:left;">{{data.topic}}</td>
                                  <!-- <td class="col-md-2">{{data.date}}</td> -->
                                  <td hidden>{{data.id}}</td>
                                  <td hidden>{{data.num}}</td>
                                  <td style="width:1%;"><button id="open-topic-btn" class="btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".open-topic-modal"><i class="fa fa-search"></i></button></td>
                                  <td style="width:1%;"><a href="<?php echo base_url() ?>/assets/files/cat{{data.category}}/{{data.topic}}" class="btn btn-primary btn-sm hvr-wobble-horizontal"><i class="fa fa-download"></i></a></td>
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <!-- <td> </td> -->
                                  <!-- <td> </td> -->
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                              </tr>
                          </tfoot>
                        </table>
                       
                        
                    </div>
                </div>
                 
                <?php
                  include APPPATH.'views/open-topic-modal.php';
                  include APPPATH.'views/add-topic-modal.php';
                  include APPPATH.'views/delete-modal.php';
                  include APPPATH.'views/add-students-modal.php';
                ?>
            </div>

        </div>
   