<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Progress_con extends Base_Controller {
	protected $model_name = 'progress_model';
	protected $default_view = 'results';
	
	function __construct(){
			parent::__construct();
	}
	
}