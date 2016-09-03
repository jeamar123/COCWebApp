<?php
include APPPATH.'models/base_model.php';
class Quizzes_uploaded_model extends Base_model {

	protected $table_name = 'quizzes_uploaded_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
	