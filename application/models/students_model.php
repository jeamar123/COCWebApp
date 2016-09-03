<?php
include APPPATH.'models/base_model.php';
class Students_model extends Base_model {

	protected $table_name = 'students_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	