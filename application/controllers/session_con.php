<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Session_con extends Base_Controller {
	protected $model_name = 'session_model';
	protected $default_view = 'dashboard';
	
	function __construct(){
			parent::__construct();
	}
	
}