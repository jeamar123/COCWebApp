<?php
include APPPATH.'models/base_model.php';
class Classes_model extends Base_model {

	protected $table_name = 'classes_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	