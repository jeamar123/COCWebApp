<?php
include APPPATH.'models/base_model.php';
class Quizzes_model extends Base_model {

	protected $table_name = 'quizzes_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	