<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Students_con extends Base_Controller {
	protected $model_name = 'students_model';
	protected $default_view = 'students';
	
	function __construct(){
			parent::__construct();
	}
	
}