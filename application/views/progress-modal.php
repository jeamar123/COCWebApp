<div id="progress-modal" class="modal fade progress-modal" role="dialog" aria-labelledby="gridSystemModalLabel" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label class="modal-title" id="gridSystemModalLabel">Student Progress</label>
      </div>
      <div id="prog-body" class="modal-body">

        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3" style="width:70px">
                <label>Name:</label>
              </div>
              <div class="col-lg-6">
                <label id="std-name"></label>
              </div>
            </div>
            <br>
            <table id="tb-1" class="table table-hover table-striped wow zoomIn">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Exam</th>
                  <th>Items</th>
                  <th>Rating</th>
                  <th>Grade</th>
                  <th>Evaluation</th>
                  <th>Date taken</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="data in progress">
                  <td>{{$index+1}}</td>
                  <td>{{data.exam}}</td>
                  <td>{{data.no_items}} / {{data.no_items}}</td>
                  <td>{{data.rating}} / {{data.no_items}}</td>
                  <td>{{data.grade}}%</td>
                  <td>{{data.evaluation}}</td>
                  <td>{{data.date}}</td>
                  <td hidden>{{data.id}}</td>
                  <td><button ng-click="get_progress_items(data.id)" class="btn btn-primary btn-sm hvr-wobble-horizontal" data-toggle="modal" data-target=".view-exam-modal"><i class="glyphicon glyphicon-duplicate"></i></button></td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td><!-- <label>Total</label> --></td>
                  <td></td>
                  <td><label id="tot-items"></label></td>
                  <td><label id="tot-rating"></label></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tfoot>  
            </table>
            <div class="row gr">
              <div class="col-lg-4"></div>
              <div class="col-lg-4"></div>
              <div class="col-lg-2" style="width:160px;">
                <!-- <label>Total Grade:</label> -->
              </div>
              <div class="col-lg-2" style="width:120px;">
                <label id="tot-grade"></label>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <button id="tbl-3-btn" class="btn btn-primary btn-sm" onclick="print();">Print</button>
              </div>
              <div class="col-lg-4"></div>
              <div class="col-lg-2 ev" style="width:160px;text-align:center;">
                <!-- <label>Overall Evaluation:</label> -->
              </div>
              <div class="col-lg-2 ev" style="width:120px;">
                <label id="overall-evaluation"></label>
              </div>
            </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
                  include APPPATH.'views/view-exam-modal.php';
                ?>