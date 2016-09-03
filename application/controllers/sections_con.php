<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Sections_con extends Base_Controller {
	protected $model_name = 'sections_model';
	protected $default_view = 'students';
	
	function __construct(){
			parent::__construct();
	}
	
}