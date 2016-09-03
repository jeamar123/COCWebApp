<?php
include APPPATH.'models/base_model.php';
class Subjects_model extends Base_model {

	protected $table_name = 'subjects_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	