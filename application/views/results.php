
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="page-header">
                                <?php
                                  if($this->session->userdata('user_type') == 'instructor_class'){
                                    echo '<span class=" wow bounceIn">Results</span>';
                                  }else{
                                    echo '<span class=" wow bounceIn">Progress</span>';
                                  }
                                ?>
                                    
                                </h1>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                              <?php
                                  if($this->session->userdata('user_type') == 'instructor_class'){
                                    echo '<i class="fa fa-file-text"></i> Results';
                                  }else{
                                    echo '<i class="fa fa-file-text"></i> Progress';
                                  }
                                ?>  
                                
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
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<th>Full Name</th>';
                                    }else{
                                      echo '<th>Exam</th>';
                                    }
                                  ?> 
                                  
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<th>Overall Grade</th>';
                                    }else{
                                      echo '<th>Grade</th>';
                                    }
                                  ?> 
                                  
                                  <th>Evaluation</th>
                                  <th>  </th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in results | filter:FilterSec">
                                  <td style="width:1%;"><input type="checkbox" value=""></td>  
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<td class="col-md-2">{{data.name}}</td>';
                                    }else{
                                      echo '<td class="col-md-2">{{data.exam}}</td>';
                                    }
                                  ?> 
                                  
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<td class="col-md-2">{{data.grade}}%</td>';
                                    }else{
                                      echo '<td class="col-md-2">{{data.grade}}%</td>';
                                    }
                                  ?> 
                                  
                                  <td class="col-md-2">{{data.evaluation}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class'){
                                      echo '<td style="width:1%;"><button ng-click="get_progress(data.student_no,data.name)" class="btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".progress-modal"><i class="fa fa-search"></i></button></td>';
                                    }else{
                                      echo '<td style="width:1%;"><button ng-click="get_progress_items(data.id)" class="btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".view-exam-modal"><i class="fa fa-search"></i></button></td>';
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
                                  <td> </td>
                              </tr>
                          </tfoot>
                        </table>
                    </div>
                </div>
                
                <?php
                  include APPPATH.'views/progress-modal.php';
                  include APPPATH.'views/view-item-modal.php';
                  include APPPATH.'views/view-items-modal.php';
                  include APPPATH.'views/feedback-modal.php';
                ?>


            </div>

        </div>    

 