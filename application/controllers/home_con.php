<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/default_controller.php';

class home_con extends Default_Controller {
	protected $model_name = 'assignments_model';
	protected $default_view = 'home';
	
	function __construct(){
			parent::__construct();
	}
	
}