<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Student_take_exam_con extends Base_Controller {
	protected $model_name = 'student_take_exam_model';
	protected $default_view = 'students';
	
	function __construct(){
			parent::__construct();
	}
	
}