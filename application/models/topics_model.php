<?php
include APPPATH.'models/base_model.php';
class Topics_model extends Base_model {

	protected $table_name = 'topics_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	