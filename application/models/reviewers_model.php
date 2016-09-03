<?php
include APPPATH.'models/base_model.php';
class Reviewers_model extends Base_model {

	protected $table_name = 'reviewers_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	