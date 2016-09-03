
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Results</span>
                                </h1>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label><h4>Section:</h4></label>
                                    <select class="form-control" ng-model="FilterSec">
                                        <option value="">ALL</option>
                                        <option ng-repeat="data in sections">{{data.section}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-tasks"></i> Results
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-hover table-striped wow fadeIn">
                          <thead>
                              <tr>
                                  <th class="chkbox"><input type="checkbox" value=""></th>
                                  <th>#</th>
                                  <th>Full Name</th>
                                  <th>Section</th>
                                  <th>Overall Grade</th>
                                  <th>Evaluation</th>
                                  <th>  </th>
                                  <th>  </th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in results | filter:FilterSec">
                                  <td class="chkbox"><input type="checkbox" value=""></td>  
                                  <td class="col-md-1">{{$index+1}}</td>
                                  <td class="col-md-2">{{data.name}}</td>
                                  <td class="col-md-2">{{data.section}}</td>
                                  <td class="col-md-2">{{data.student_grade}}</td>
                                  <td class="col-md-2">{{data.student_evaluation}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <td class="row-btn"><button ng-click="get_eval(data.student_id,data.id_num,data.name,data.section);get_progress(data.student_id)" class="btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".progress-modal">Progress</button></td>
                                  <td class="row-btn"><button ng-click="" class="btn btn-danger btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".feedback-modal">Feedback</button></td>
                              </tr>                          
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
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
                  include APPPATH.'views/progress-modal.php';
                  include APPPATH.'views/feedback-modal.php';
                ?>


            </div>

        </div>    

 