

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Students</span>
                                    <?php
                                      if($this->session->userdata('user_type') == 'admin'){
                                        echo '<button id="add-students-open" class="btn btn-warning btn-sm hvr-icon-float-away" data-toggle="modal" data-target=".add-students-modal" >Add</button>
                                              <button id="stud-opt-edit" class="btn btn-info btn-sm options-btn hvr-icon-rotate edit-btns">Edit</button>
                                              <button id="stud-opt-delete" class="btn btn-danger btn-sm options-btn hvr-icon-sink-away del-btns" data-toggle="modal" data-target=".delete-modal">Delete</button> ';
                                      }
                                    ?>
                                    <button onclick="print()" class="btn btn-info btn-sm" >Print &nbsp;<i class="fa fa-print"></i></button>
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
                                <i class="fa fa-child"></i> students
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row slideform" id="edit-form" hidden>
                          <div class="col-lg-12">
                            <form class="form-inline">
                              <!-- <div class="form-group">
                                <label for="exampleInputEmail3">Section</label><br>
                                <select id="sec" class="form-control">
                                  <option selected="selected"></option>
                                  <option>R1</option>
                                  <option>R2</option>
                                  <option>R3</option>
                                </select>
                              </div> -->
                              <div class="form-group">
                                <label for="exampleInputEmail3">Id Number</label><br>
                                <input type="text" class="form-control" id="idnum">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail3">Full Name</label><br>
                                <input type="text" class="form-control" id="fname">
                              </div>
                              <!-- <div class="form-group">
                                <label for="exampleInputEmail3">Section</label><br>
                                <select id="sec" name="sec" class="form-control" >
                                  <option value="" selected="selected"></option>
                                  <option ng-repeat="data in sections">{{data.section}}</option>
                                </select>
                              </div> -->
                              <div class="form-group">
                                <label for="exampleInputEmail3">Password</label><br>
                                <input type="text" class="form-control" id="pass">
                                <button id="std-done-edit-btn" class="btn btn-danger ">Done</button>
                              </div>
                            </form>
                          </div>
                        </div>

                <div id="prog-body" class="row">
                    <div class="col-lg-12">
                        <table id="students-tbl" class="table table-hover table-striped wow fadeIn">
                          <thead class="">
                              <tr>
                                  <th><input type="checkbox" ng-model="selectedAll" ng-click="checkAll('1')" value=""></th>
                                  <th>#</th>
                                  <th>Id Number</th>
                                  <th>Full Name</th>
                                  <!-- <th>Section</th> -->
                                  <?php
                                    if($this->session->userdata('user_type') == 'admin'){
                                      echo '<th> </th>';  
                                    }
                                  ?>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class' || $this->session->userdata('user_type') == 'instructor'){
                                      echo '<th> </th>';  
                                    }
                                  ?>
                              </tr>
                          </thead>
                          <tbody>
                              <tr ng-repeat="data in students | filter:searchText | filter:FilterSec">
                                  <td style="width:1%;"><input id="stud-id" type="checkbox" ng-model="data.Selected" ng-click="checkedbox('{{data.session_no}}')" name="check-id" value="{{data.session_no}}"></td>
                                  <td style="width:5%;">{{$index+1}}</td>
                                  <td class="col-md-2">{{data.id_number}}</td>
                                  <td class="col-md-2">{{data.name}}</td>
                                  <td hidden>{{data.id}}</td>
                                  <td hidden>{{data.password}}</td>
                                  <td hidden>{{data.section}}</td>
                                  <td hidden>{{data.session_no}}</td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'admin'){
                                      echo '<td style="width:1%;"><button ng-click="open_students(data.id,data.name)" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".open-students-modal"><i class="glyphicon glyphicon-search"></i></button></td>';
                                    }
                                  ?>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class' || $this->session->userdata('user_type') == 'instructor'){
                                      echo '<td style="width:1%;"><button ng-click="get_progress(data.id,data.name)" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".progress-modal"><i class="glyphicon glyphicon-search"></i></button></td>';
                                    }
                                  ?>
                                  
                                  <!-- <td hidden>{{data.pass}}</td> -->
                                  <!-- <td class="row-btn"><button ng-click="get_eval(data.id,data.id_num,data.name,data.section);get_progress(data.id)" class="btn btn-primary btn-sm row-open-btn hvr-wobble-horizontal" id="eval-btn" data-toggle="modal" data-target=".progress-modal" >Evaluation</button></td> -->
                              </tr>
                          </tbody>
                          <tfoot>
                              <tr>
                                  <td> </td>
                                  <td> </td>
                                  <td> </td>
                                  <!-- <td> </td> -->
                                  <td> </td>
                                  <?php
                                    if($this->session->userdata('user_type') == 'admin'){
                                      echo '<td> </td>';  
                                    }
                                  ?>
                                  <?php
                                    if($this->session->userdata('user_type') == 'instructor_class' || $this->session->userdata('user_type') == 'instructor'){
                                      echo '<td> </td>';  
                                    }
                                  ?>
                                  
                              </tr>
                          </tfoot>
                        </table>
                       
                        
                    </div>
                </div>
                <script type="text/javascript">
                  function print(){
                    var disp_setting="scrollbars=yes,width=780, height=780, left=100, top=25";
                    var docprint = window.open("about:blank", "_blank", disp_setting);
                    
                    var stylesheet = '<link href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css\" rel=\"stylesheet\"';

                        docprint.document.open(); 
                        docprint.document.write('<html><head><title>Print</title>'); 
                        docprint.document.write('</head><body>' + $('#prog-body')[0].outerHTML + '</body></html>');
                        docprint.document.close(); 
                        docprint.print();
                        docprint.close();
                  }
                </script>
                <?php
                  include APPPATH.'views/delete-modal.php';
                  include APPPATH.'views/add-students-modal.php';
                  include APPPATH.'views/progress-modal.php';
                ?>
            </div>

        </div>
        