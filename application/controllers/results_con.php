<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Results_con extends Base_Controller {
	protected $model_name = 'results_model';
	protected $default_view = 'results';
	
	function __construct(){
			parent::__construct();
	}
	
}