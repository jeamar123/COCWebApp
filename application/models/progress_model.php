<?php
include APPPATH.'models/base_model.php';
class Progress_model extends Base_model {

	protected $table_name = 'progress_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	