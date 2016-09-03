<?php
include APPPATH.'models/base_model.php';
class Dashboard_model extends Base_model {

	protected $table_name = 'dashboard_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	