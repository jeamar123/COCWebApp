<?php
include APPPATH.'models/base_model.php';
class Instructors_model extends Base_model {

	protected $table_name = 'instructors_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	