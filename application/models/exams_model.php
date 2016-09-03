<?php
include APPPATH.'models/base_model.php';
class Exams_model extends Base_model {

	protected $table_name = 'exams_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	