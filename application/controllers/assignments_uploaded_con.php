<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Assignments_uploaded_con extends Base_Controller {
	protected $model_name = 'assignments_uploaded_model';
	protected $default_view = 'students';
	
	function __construct(){
			parent::__construct();
	}
	
}