<?php
include APPPATH.'models/base_model.php';
class Admin_model extends Base_model {

	protected $table_name = 'admin_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	