<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Exam_items_con extends Base_Controller {
	protected $model_name = 'exam_items_model';
	protected $default_view = 'exams';
	
	function __construct(){
			parent::__construct();
	}
	
}