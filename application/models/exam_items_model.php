<?php
include APPPATH.'models/base_model.php';
class Exam_items_model extends Base_model {

	protected $table_name = 'exam_items_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	