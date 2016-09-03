<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mobile_controller extends CI_Controller {
	
	protected $model_name = '';
	protected $default_view = '';
	
	function __construct(){

		parent::__construct();
		$this->load->model($this->model_name,"model");
		
	}
	// DEFAULT FUNCTION
	public function index(){
		echo "HI";
	}

	// BASIC FUNCTIONS
	public function get(){
		$data = $this->model->get();
		echo json_encode($data);
	}

	public function add(){
		$data = $this->model->add($_POST);
		echo $data;
	}
	
	public function update($rowid){
		$data = $this->model->update($_POST,$rowid);
		echo $data;
	}
	public function delete($id){
		$data = $this->model->delete($id);
		echo $data;
	}
	// END OF BASIC FUNCTIONS

}