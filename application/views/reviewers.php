

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-11">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Reviewers</span>
                                    <button id="summernote-open" class="btn btn-warning btn-sm hvr-icon-float-away" data-toggle="modal" data-target=".add-reviewer-modal" >Add</button>
                                    <button id="opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate">Edit</button>
                                    <button id="opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away">Delete</button> 
                                </h1>
                            </div>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-clipboard"></i> Reviewers
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-hover table-striped wow fadeIn">
                          <thead>
                              <tr>
                                  <th class="chkbox"><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('2')" value=""></th>
                                  <th class="col-md-1">#</th>
                                  <th class="col-md-4">Name</th>
                                  <th class=""></th>
                                  <th class="col-md-3">Timer</th>
                                  <th class="col-md-2"> Status  </th>
                                  <th>  </th>
                                  <th>  </th>
                              </tr>
                          </thead>
                          <tbody id="reviewer-tbl">
                              <tr ng-repeat="data in reviewers">
                                  <td class="chkbox"><input id="reviewer-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.id}}')" name="check-id" value="{{data.id}}"></td>
                                  <td class="col-md-1">{{$index+1}}</td>
                                  <td class="col-md-4">{{data.chapter_name}}</td>
                                  <td class=""></td>
                                  <td class="col-md-3">{{data.chapter_timer}}</td>
                                  <td class="col-md-2">{{data.chapter_status}}</td>
                                  <td class="row-btn up"><button class="btn btn-primary btn-sm row-open-btn hvr-wobble-horizontal" data-toggle="modal" data-target=".time-limit-modal" >Open</button></td>
                                  <td class="row-btn down"><button class="btn btn-success btn-sm row-close-btn hvr-wobble-horizontal" data-toggle="modal" data-target=".remove-time-limit-modal">Close</button></td>
                              <tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td class="col-md-1"> </td>
                                  <td class="col-md-4"> </td>
                                  <td class=""> </td>
                                  <td class="col-md-3"> </td>
                                  <td class="col-md-2"> </td>
                                  <td> </td>
                                  <td> </td>
                              </tr>
                          </tfoot>
                        </table>
                    </div>
                </div>
                <?php
                  include APPPATH.'views/add-reviewer-modal.php';
                ?>
                <?php
                  include APPPATH.'views/time-limit-modal.php';
                ?>
                <?php
                  include APPPATH.'views/remove-time-limit-modal.php';
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->