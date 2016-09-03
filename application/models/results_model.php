<?php
include APPPATH.'models/base_model.php';
class Results_model extends Base_model {

	protected $table_name = 'results_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	