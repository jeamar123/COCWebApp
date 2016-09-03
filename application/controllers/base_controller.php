<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_controller extends CI_Controller {
	
	protected $model_name = '';
	protected $default_view = '';
	
	function __construct(){

		parent::__construct();
		$this->load->model($this->model_name,"model");

		
		if (isset($_SERVER['HTTP_ORIGIN'])) {
		    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		    header('Access-Control-Allow-Credentials: true');
		    header('Access-Control-Max-Age: 86400');    // cache for 1 day
		}

		// Access-Control headers are received during OPTIONS requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

		    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

		    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

		    exit(0);
		}
		
	}
	// DEFAULT FUNCTION
	public function index($view=FALSE){
		$array = array('username' => $this->session->userdata('username'),'password' => $this->session->userdata('password'));
		if($this->session->userdata('logged_in') == TRUE){

			if($this->session->userdata('user_type') == 'admin'){
				$data['user'] = $this->model->get_admin_data($array);
				if($view)
					$data['view'] = $view;
				else
					$data['view'] = "dashboard_admin";
				$this->load->view("index_admin",$data);
			}else if($this->session->userdata('user_type') == 'instructor'){
				$data['user'] = $this->model->get_user_data($array,'instructors_tbl','id','session_no');
				if($view == 'students'){
					$data['view'] = 'students';
					$this->load->view("index_ins",$data);
					$this->session->set_userdata('user_type','instructor_class') ;
				}else{
					if($view)
						$data['view'] = $view;
					else
						$data['view'] = $this->default_view;
					$this->load->view("index",$data);
				}
				
			}else if($this->session->userdata('user_type') == 'instructor_class'){
				$data['user'] = $this->model->get_user_data($array,'instructors_tbl','id','session_no');
				if($view == 'dashboard'){
					$data['view'] = 'blank';
					$this->load->view("index",$data);
					$this->session->set_userdata('user_type','instructor') ;
				}else{
					if($view)
						$data['view'] = $view;
					else
						$data['view'] = $this->default_view;
					$this->load->view("index_ins",$data);
				}
				
			}else if($this->session->userdata('user_type') == 'student'){
				$data['user'] = $this->model->get_user_data($array,'students_tbl','id','session_no');
				if($view == 'topics'){
					$data['view'] = "topics";
					$this->load->view("index_student_class",$data);
					$this->session->set_userdata('user_type','student_class') ;
				}else{
					if($view)
						$data['view'] = $view;
					else
						$data['view'] = "blank";
					$this->load->view("index_student",$data);
				}
			}else if($this->session->userdata('user_type') == 'student_class'){
				$data['user'] = $this->model->get_user_data($array,'students_tbl','id','session_no');
				if($view == 'dashboard'){
					$data['view'] = "blank";
					$this->load->view("index_student",$data);
					$this->session->set_userdata('user_type','student') ;
				}else if($view == 'take_exam'){
					$data['view'] = "take_exam";
					$this->load->view("index_exam",$data);
					$this->session->set_userdata('user_type','student_take_exam') ;
				}else{
					if($view)
						$data['view'] = $view;
					else
						$data['view'] = "topics";
					$this->load->view("index_student_class",$data);
				}
			}else if($this->session->userdata('user_type') == 'student_take_exam'){
				$data['user'] = $this->model->get_user_data($array,'students_tbl','id','session_no');
				
				// $data['view'] = "take_exam";
				// $this->load->view("index_exam",$data);
				// $this->session->set_userdata('user_type','student_take_exam') ;
				$data['view'] = 'exams';
				$this->load->view("index_student_class",$data);
				$this->session->set_userdata('user_type','student_class') ;
			}



		}else{
			$this->load->view("signin");
		}
		
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

	// SESSION
	public function register(){
		$array = array('username' => $_POST['username']);
		$data = $this->model->get_by_col($array);
		if(count($data) == 0){
			$this->model->add($_POST);
			echo 3;
		}else{
			echo 2;
		}
	}

	public function session(){
		// $array = array('id_number' => $_POST['username']);
		$array = array('username' => $_POST['username'],'password' => $_POST['password']);
		$data = $this->model->session($array);
		if(count($data) != 0){

			foreach($data as $data){
				$newdata = array(
				   'user_type'  => $data->user_type,
                   'username'  => $_POST['username'],
                   'password'  => $_POST['password'],	
                   'logged_in' => TRUE
               );
			}
			
			$this->session->set_userdata($newdata);

			echo json_encode($data);
		}else{
			echo 0;
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('/default_con');
	}

	// END OF SESSION

	public function do_upload(){
		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();

			// $this->load->view('upload_form', $error);
		}else{
			$this->upload->data();
			echo 1;
			// $this->load->view('upload_success', $data);
		}
	}
	public function do_upload_topics(){
		$config['upload_path'] = './assets/topics/';
		$config['allowed_types'] = 'doc|docx|xls|ppt|pptx|pdf|txt';
		$config['max_size']	= '9999999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);		

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();

			// $this->load->view('upload_form', $error);
		}else{
			$this->upload->data();

			echo 1;
			// $this->load->view('upload_success', $data);
		}
	}
	public function do_upload_ass(){
		$config['upload_path'] = './assets/assignments/';
		$config['allowed_types'] = 'doc|docx|xls|ppt|pdf|txt';
		$config['max_size']	= '9999999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();

			// $this->load->view('upload_form', $error);
		}else{
			$this->upload->data();
			echo 1;
			// $this->load->view('upload_success', $data);
		}
	}

	public function do_upload_ass_ans(){
		$config['upload_path'] = './assets/assignment_answers/';
		$config['allowed_types'] = 'doc|docx|xls|ppt|pdf|txt';
		$config['max_size']	= '9999999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();

			// $this->load->view('upload_form', $error);
		}else{
			$this->upload->data();
			echo 1;
			// $this->load->view('upload_success', $data);
		}
	}

	public function do_upload_quiz(){
		$config['upload_path'] = './assets/quizzes/';
		$config['allowed_types'] = 'doc|docx|xls|ppt|pdf|txt';
		$config['max_size']	= '9999999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();

			// $this->load->view('upload_form', $error);
		}else{
			$this->upload->data();
			echo 1;
			// $this->load->view('upload_success', $data);
		}
	}

	public function do_upload_quiz_ans(){
		$config['upload_path'] = './assets/quizzes_answers/';
		$config['allowed_types'] = 'doc|docx|xls|ppt|pdf|txt';
		$config['max_size']	= '9999999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();

			// $this->load->view('upload_form', $error);
		}else{
			$this->upload->data();
			echo 1;
			// $this->load->view('upload_success', $data);
		}
	}
	
	// GET ALL DATA ADMIN
	public function get_all_students(){
		$array = array('user_type' => $_POST['user_type']);
		$data = $this->model->get_by_col_join_left($array,'session_tbl','id','session_no');

		echo json_encode($data);
	}

	

	public function get_instructors(){
		$array = array('user_type' => $_POST['user_type']);
		$data = $this->model->get_by_col_join_left($array,'session_tbl','id','session_no');
		echo json_encode($data);
	}

	public function get_instructor_by_session_no(){
		$array = array('session_no' => $_POST['session_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}
	public function get_student_by_session_no(){
		$array = array('session_no' => $_POST['session_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}
	public function get_topics_by_class_no(){
		$array = array('class_no' => $_POST['class_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}
	public function get_ass_by_class_no(){
		$array = array('class_no' => $_POST['class_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}
	public function get_quiz_by_class_no(){
		$array = array('class_no' => $_POST['class_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}
	public function get_exams_by_class_no(){
		$array = array('class_no' => $_POST['class_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}

	public function get_all_classes(){
		$array = 'classes_tbl.id,classes_tbl.section_no,classes_tbl.subject_no,classes_tbl.instructor_no,classes_tbl.no_students,sections_tbl.section,subjects_tbl.subject,instructors_tbl.name';
		$data = $this->model->get_select_by_join_left_three($array,'sections_tbl','id','section_no','subjects_tbl','id','subject_no','instructors_tbl','id','instructor_no');

		echo json_encode($data);
	}


	// GET DATA FOR INSTRUCTOR
	public function get_students_by_ins(){
		$array = array('instructor_no' => $_POST['instructor_no']);
		$data = $this->model->get_by_col_join_left($array,'instructor_students_tbl','student_no','id');

		echo json_encode($data);
	}

	public function get_students_by_class_no(){
		$array = array('class_no' => $_POST['class_no']);
		$data = $this->model->get_by_col_join_left($array,'class_students_tbl','student_no','id');

		echo json_encode($data);
	}

	public function get_classes_by_ins(){
		$array = array('instructor_no' => $_POST['instructor_no']);
		$array2 = 'classes_tbl.id,classes_tbl.section_no,classes_tbl.subject_no,classes_tbl.instructor_no,classes_tbl.no_students,sections_tbl.section,subjects_tbl.subject,instructors_tbl.name';
		$data = $this->model->get_select_by_col_join_left_three($array,$array2,'sections_tbl','id','section_no','subjects_tbl','id','subject_no','instructors_tbl','id','instructor_no');

		echo json_encode($data);
	}

	// CLASSES

	public function get_students_by_class(){
		$array = array('class_no' => $_POST['class_no']);
		$data = $this->model->get_by_col_join_left($array,'students_tbl','id','student_no');

		echo json_encode($data);
	}

	public function get_classes_by_student(){
		$array = array('student_no' => $_POST['student_no']);
		$data = $this->model->get_by_col($array);

		echo json_encode($data);
	}

	public function get_classes_by_id(){
		$array = array('classes_tbl.id' => $_POST['id']);
		$array2 = 'classes_tbl.id,classes_tbl.section_no,classes_tbl.subject_no,classes_tbl.instructor_no,classes_tbl.no_students,sections_tbl.section,subjects_tbl.subject,instructors_tbl.name';
		$data = $this->model->get_select_by_col_join_left_three($array,$array2,'sections_tbl','id','section_no','subjects_tbl','id','subject_no','instructors_tbl','id','instructor_no');

		echo json_encode($data);
	}

	public function get_ans_by_ass(){
		$array = array('ass_no' => $_POST['ass_no']);
		$data = $this->model->get_by_col($array);

		echo json_encode($data);
	}

	public function get_ans_by_quiz(){
		$array = array('quiz_no' => $_POST['quiz_no']);
		$data = $this->model->get_by_col($array);

		echo json_encode($data);
	}


	// STUDENTS

	public function get_topic_content(){
		$array = array('id' => $_POST['id']);
		$data = $this->model->get_by_col($array);

		echo json_encode($data);
	}

	public function get_ass_content(){
		$array = array('id' => $_POST['id']);
		$data = $this->model->get_by_col($array);

		echo json_encode($data);
	}

	public function get_res_status(){
		$array = array('student_no' => $_POST['student_no'],'exam_no' => $_POST['exam_no']);
		$data = $this->model->get_by_col($array);

		if( count($data) != 0 ){
			echo json_encode($data);
		}else{
			echo 0;
		}
		
	}

	public function get_classes_by_std(){
		$array = array('student_no' => $_POST['student_no']);
		$array2 = 'classes_tbl.id,classes_tbl.no_students,sections_tbl.section,subjects_tbl.subject,instructors_tbl.name';
		$data = $this->model->get_select_by_col_join_left_four_custom($array,$array2,'sections_tbl','id','section_no','subjects_tbl','id','subject_no','instructors_tbl','id','instructor_no','class_students_tbl','id','class_no');

		echo json_encode($data);
	}
	// END OF STUDENTS
	
	// EXAMS
	public function get_chapter_name(){
		$array = array('exam_name' => $_POST['exam_name']);
		$data = $this->model->get_by_col($array);

		if(count($data) != 0){
			echo 1;
		}else{
			echo 0;
		}
	}

	public function get_no_content($id){
		$array = array('exam_no' => $id);
		$data = $this->model->get_by_col($array);

		echo count($data);
	}
	//////
	public function get_items(){
		$array = array('exam_no' => $_POST['exam_no']);
		$data = $this->model->get_by_col($array);

		echo json_encode($data);
	}
	public function get_item(){
		$array = array('id' => $_POST['id']);
		$data = $this->model->get_by_id($array);

		echo json_encode($data);
	}

	public function get_exam(){
		$array = array('id' => $_POST['id']);
		$data = $this->model->get_by_id($array);

		echo json_encode($data);
	}

	
	// END OF EXAMS

	// RESULTS
	public function get_result(){
		$array = array('student_no' => $_POST['student_no']);
		$data = $this->model->get_by_col($array);
		if( count($data) != 0){
			echo json_encode($data);
		}else{
			echo 0;
		}
	}

	public function get_results(){
		$array = array('class_no' => $_POST['class_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}

	public function get_progress(){
		$array = array('student_no' => $_POST['student_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}

	public function get_progress_items(){
		$array = array('progress_no' => $_POST['progress_no']);
		$data = $this->model->get_by_col($array);
		echo json_encode($data);
	}
	public function get_progress_items_by_exam(){
		$array = array('progress_no' => $_POST['progress_no']);
		$data = $this->model->get_by_col_join_left($array,'exam_content_tbl','id','exam_content_no');
		echo json_encode($data);
	}
	public function get_items_analysis(){
		// $array = 'progress_items_tbl.exam_content_no = ' . $_POST['exam'] . ' && progress_items_tbl.evaluation = ' . $_POST['eval'];
		$data['total'] = $this->model->get_custom($_POST['item_no'],$_POST['ins'],$_POST['sec']);
		$data['pass'] = $this->model->get_custom_pass($_POST['item_no'],$_POST['ins'],$_POST['sec']);
		$data['fail'] = $this->model->get_custom_fail($_POST['item_no'],$_POST['ins'],$_POST['sec']);
		echo json_encode($data);
		// echo $array;
	}
	public function get_progress_exams(){
		$array = array('student_no' => $_POST['student_no']);
		$data = $this->model->get_by_col_join_left_group($array,'exams_tbl','id','exam_no','exam_no');
		echo json_encode($data);
	}	

	public function get_exams(){
		$array = array('student_no' => $_POST['student_no'],
						'exam_no' => $_POST['exam_no'],);
		$data = $this->model->get_by_col_join_left_order($array,'exams_tbl','id','exam_no','exam_no','ASC');
		echo json_encode($data);
	}		

	public function get_max_id(){
		$data = $this->model->get_max($_POST['cols']);
		echo json_encode($data);
	}


	public function update_results($col,$col_val){
		$data = $this->model->update_by_col($_POST,$col,$col_val);
		echo $data;
	}
	// END OF RESULTS

}

?>