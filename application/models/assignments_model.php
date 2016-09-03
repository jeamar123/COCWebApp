<?php
include APPPATH.'models/base_model.php';
class Assignments_model extends Base_model {

	protected $table_name = 'assignments_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	