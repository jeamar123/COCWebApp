<?php
include APPPATH.'models/base_model.php';
class Sections_model extends Base_model {

	protected $table_name = 'sections_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	