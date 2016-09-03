<?php
include APPPATH.'models/base_model.php';
class Session_model extends Base_model {

	protected $table_name = 'session_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	