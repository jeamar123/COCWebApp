<?php
include APPPATH.'models/base_model.php';
class Instructor_students_model extends Base_model {

	protected $table_name = 'instructor_students_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	