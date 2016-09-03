<div id="add-topic-modal" class="modal fade add-topic-modal" role="dialog" aria-labelledby="gridSystemModalLabel" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="summernote-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <label id="gridSystemModalLabel">Add Topic</label>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <button id="show-ups" class="btn btn-primary">Upload</button>
              <button id="summernote-open" class="btn btn-primary">Input Manually</button>
              <input id="opt-inp" type="hidden">
            </div>
          </div>
          <br>
          <div class="ups" hidden>
            
            <div class="row">
              <div class="col-lg-12">
                <form class="form-inline" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputPassword3">Add Topic:</label><br>
                    <input id="userfile" type="file" name="userfile" class="topic-file form-control">
                    <button id="" class="btn btn-danger done-add-top-btn">Done</button>
                  </div>
                </form>
                <br>
              </div>
            </div>
          </div>
          
          <div class="summ" hidden>
            <div class="row">
              <div class="col-lg-12">
                <label>Title:</label>
                <input id="rev-title" class="form-control" type="text">
                <br>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <label>Content</label>
                <div id="summernote"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-2">
                <button id="" class="btn btn-danger hvr-icon-wobble-horizontal done-add-top-btn" data-loading-text="Loading" autocomplete="off" type="button">Done</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

