<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Exams_con extends Base_Controller {
	protected $model_name = 'exams_model';
	protected $default_view = 'exams';
	
	function __construct(){
			parent::__construct();
	}
	
}