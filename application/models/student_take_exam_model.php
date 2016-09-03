
<?php
include APPPATH.'models/base_model.php';
class Student_take_exam_model extends Base_model {

	protected $table_name = 'student_take_exam_tbl';
	protected $primary_key = 'id';
	
	function __construct()
    {
        parent::__construct();
    }

}	
	
