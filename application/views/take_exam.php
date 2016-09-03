

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-7">
                                <h1 class="page-header">
                                    <span class=" wow bounceIn">Exam</span>
                                </h1>
                            </div>
                        </div>
                        <ol class="breadcrumb ">
                        </ol>
                    </div>
                </div>
                <div class="result_container" hidden>
                  <div class="items">
                    <div class="panel panel-success" >
                        <div class="panel-heading">
                          <label>Result</label>
                        </div>
                        <div class="panel-body">
                          <div class="loading-spinner" style="margin:0 auto;display:none;"></div>
                          <div class="col-lg-4">
                            <label>No. of Items :</label><br>
                            <label>Rating :</label><br>
                            <label>Evaluation :</label><br>
                          </div>
                          <div class="col-lg-8">
                            <!-- <label><span id="exam">Result:</span></label><br> -->
                            <label><span id="items"></span></label><br>
                            <label><span id="rating"></span></label><br>
                            <label><span id="eval"></span></label><br>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="exams_container" hidden>
                  <div class="items">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="font-weight:bold;color:#111;">
                          <span id="count" style="margin-right:10px;">1. </span><span id="items_question">
                         <!-- The questions should only be used as a preparatory tool for the exam. The proportionality of the questions on the pages in this section does not reflect the proportionality of the questions on the exam?-->
                          </span>
                        </div>
                        <div class="panel-body">
                          <div class="loading-spinner" style="margin:0 auto;display:none;"></div>
                          <br>
                          <input type="radio" name="correct-answer0" value="0" hidden checked>
                          <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="1"><span id="items_answer1">answer1</span></label></div>
                          <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="2"><span id="items_answer2">answer2</span></label></div>
                          <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="3"><span id="items_answer3">answer3</span></label></div>
                          <div class="radio"><label style="width:100%"><input type="radio" name="correct-answer0" value="4"><span id="items_answer4">answer4</span></label></div>
                          
                          <div id="alert-exam-active" class="wow shake" style="width:35%;display:none;"><div class="alert alert-danger" style="padding:10px;margin-bottom:0px;margin-top:20px;">Select your answer.</div></div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="exam_info_container">
                  <div class="panel panel-success">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                      <table class="table">
                        <thead>
                          <tr class="success">
                            <th style="border:2px solid #ddd;">Exam</th>
                            <th style="border:2px solid #ddd;">Time</th>
                            <th style="border:2px solid #ddd;">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="border:1px solid #ddd;"><span id="exam_name"></span></td>
                            <td style="border:1px solid #ddd;"><span id="exam_time"></span></td>
                            <td style="border:1px solid #ddd;"><span id="exam_status"></span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row ">
                    <div class="col-lg-12" style="text-align:center;">
                        <button id="start_exam_btn" ng-click="get_exam_items();exam_timer();" class="btn btn-warning btn-lg hvr-icon-buzz" style="display:none;">Start</button>
                        <button id="get_next_item_btn" ng-click="get_next_exam_items()" class="btn btn-warning btn-lg hvr-icon-forward" style="display:none;">Next</button>
                        <button id="submit_exam_btn" ng-click="submit_exam_btn()" class="btn btn-default btn-lg" style="display:none;">Submit</button>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <?php
                  include APPPATH.'views/progress-modal.php';
                ?>
            </div>

        </div>
   