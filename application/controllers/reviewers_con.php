<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH.'controllers/base_controller.php';

class Reviewers_con extends Base_Controller {
	protected $model_name = 'reviewers_model';
	protected $default_view = 'reviewers';
	
	function __construct(){
			parent::__construct();
	}
	
}