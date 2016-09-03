<?php

class Base_model extends CI_Model {

	protected $primary_key = '';
	protected $table_name = '';
	
	function __construct()
    {	
        parent::__construct();
    }


    function session($cols){
        return $this->db->where($cols)->from($this->table_name)->order_by("id")->get()->result_object();
    }
    function get_admin_data($cols){
        return $this->db->where($cols)->from($this->table_name)->order_by("id")->get()->result_object();
    }
    function get_user_data($cols,$tbl,$col,$col2){
        return $this->db->where($cols)->from($this->table_name)->join($tbl,$tbl .'.'. $col2 .'='. $this->table_name .'.'. $col ,'left')->get()->result_object();
    }

    // GET
    function get(){
    	return $this->db->from($this->table_name)->get()->result_object();
    }

    function get_by_id($cols){
        return $this->db->where($cols)->from($this->table_name)->get()->result_object();
    }

    function get_by_col($cols){
        return $this->db->where($cols)->from($this->table_name)->get()->result_object();
    }

    function get_by_col_join_left_order($cols,$tbl,$col,$col2,$order_col,$order){
        return $this->db->where($cols)->from($tbl)->join($this->table_name,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->order_by($order_col,$order)->get()->result_object();
        // return $this->db->query("SELECT * FROM $tbl LEFT JOIN $this->table_name ON $tbl.$col = $this->table_name.$col2 WHERE student_no = $cols GROUP BY exam_no DESC")->result_object();
    }

    function get_by_col_join_left_group($cols,$tbl,$col,$col2,$group){
        return $this->db->where($cols)->from($tbl)->join($this->table_name,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->group_by($group)->get()->result_object();
        // return $this->db->query("SELECT * FROM $tbl LEFT JOIN $this->table_name ON $tbl.$col = $this->table_name.$col2 WHERE student_no = $cols GROUP BY exam_no DESC")->result_object();
    }

    function get_by_col_join_left($cols,$tbl,$col,$col2){
        return $this->db->where($cols)->from($tbl)->join($this->table_name,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->get()->result_object();
    }
    function get_by_col_join_left_two($cols,$tbl,$col,$col2,$tbl2,$col3,$col4){
        return $this->db->where($cols)->from($this->table_name)->join($tbl,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->join($tbl2,$this->table_name .'.'. $col4 .'='. $tbl2 .'.'. $col3 ,'left')->get()->result_object();
    }
    function get_by_col_join_right($cols,$tbl,$col,$col2){
        return $this->db->where($cols)->from($tbl)->join($this->table_name,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'right')->get()->result_object();
    }
    function get_by_col_join_right_three($cols,$tbl,$col,$col2,$tbl2,$col3,$col4,$tbl3,$col5,$col6){
        return $this->db->where($cols)->from($this->table_name)->join($tbl3,$this->table_name .'.'. $col6 .'='. $tbl3 .'.'. $col5 ,'left')->join($tbl,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'right')->join($tbl2,$this->table_name .'.'. $col4 .'='. $tbl2 .'.'. $col3 ,'right')->get()->result_object();
    }



    function get_by_join($tbl,$col,$col2){
        return $this->db->from($tbl)->join($this->table_name,$tbl .'.'. $col2 .'='. $this->table_name .'.'. $col ,'left')->get()->result_object();
    }
    function get_by_join_left_two($tbl,$col,$col2,$tbl2,$col3,$col4){
        return $this->db->from($this->table_name)->join($tbl,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->join($tbl2,$this->table_name .'.'. $col4 .'='. $tbl2 .'.'. $col3 ,'left')->get()->result_object();
    }
    function get_by_join_left_three($tbl,$col,$col2,$tbl2,$col3,$col4,$tbl3,$col5,$col6){
        return $this->db->from($this->table_name)->join($tbl,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->join($tbl2,$this->table_name .'.'. $col4 .'='. $tbl2 .'.'. $col3 ,'left')->join($tbl3,$this->table_name .'.'. $col6 .'='. $tbl3 .'.'. $col5 ,'left')->get()->result_object();
    }

    function get_select_by_join_left_three($select,$tbl,$col,$col2,$tbl2,$col3,$col4,$tbl3,$col5,$col6){
        return $this->db->select($select)->from($this->table_name)->join($tbl,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->join($tbl2,$this->table_name .'.'. $col4 .'='. $tbl2 .'.'. $col3 ,'left')->join($tbl3,$this->table_name .'.'. $col6 .'='. $tbl3 .'.'. $col5 ,'left')->get()->result_object();
    }

    function get_select_by_col_join_left_three($cols,$select,$tbl,$col,$col2,$tbl2,$col3,$col4,$tbl3,$col5,$col6){
        return $this->db->select($select)->where($cols)->from($this->table_name)->join($tbl,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->join($tbl2,$this->table_name .'.'. $col4 .'='. $tbl2 .'.'. $col3 ,'left')->join($tbl3,$this->table_name .'.'. $col6 .'='. $tbl3 .'.'. $col5 ,'left')->get()->result_object();
    }

    function get_select_by_col_join_left_four_custom($cols,$select,$tbl,$col,$col2,$tbl2,$col3,$col4,$tbl3,$col5,$col6,$tbl4,$col7,$col8){
        return $this->db->select($select)->where($cols)->from($this->table_name)->join($tbl,$tbl .'.'. $col .'='. $this->table_name .'.'. $col2 ,'left')->join($tbl2,$this->table_name .'.'. $col4 .'='. $tbl2 .'.'. $col3 ,'left')->join($tbl3,$this->table_name .'.'. $col6 .'='. $tbl3 .'.'. $col5 ,'left')->join($tbl4,$this->table_name .'.'. $col7 .'='. $tbl4 .'.'. $col8 ,'left')->get()->result_object();
    }

    function get_max($cols){
        return $this->db->select_max($cols)->from($this->table_name)->get()->result_object();
    }

    // ADD
    function add($data){
    	if($this->db->insert($this->table_name,$data)){
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }

    // EDIT
    function update($data,$id){
    	if($this->db->where("id",$id)->update($this->table_name,$data)){
            return 1;
        }else{
            return 0;
        }
    }

    function update_by_col($data,$col,$col_val){
        if($this->db->where($col,$col_val)->update($this->table_name,$data)){
            return 1;
        }else{
            return 0;
        }
    }

    // DELETE
    function delete($id){
    	if($this->db->where("id",$id)->delete($this->table_name)){
            return 1;
        }else{
            return 0;
        }
    }
		
	// Custom
    function get_custom($col,$ins,$sec){
        if($sec != ""){
            $query = $this->db->query("SELECT * FROM  progress_items_tbl LEFT JOIN progress_tbl ON progress_items_tbl.progress_no = progress_tbl.id LEFT JOIN students_tbl ON progress_tbl.student_no = students_tbl.id WHERE students_tbl.section = '$sec' && students_tbl.instructor_id = $ins && progress_items_tbl.exam_content_no = $col");
        }else{
            $query = $this->db->query("SELECT * FROM  progress_items_tbl LEFT JOIN progress_tbl ON progress_items_tbl.progress_no = progress_tbl.id LEFT JOIN students_tbl ON progress_tbl.student_no = students_tbl.id WHERE students_tbl.instructor_id = $ins && progress_items_tbl.exam_content_no = $col");
        }
        
        return $query->result_object();
    }
    function get_custom_pass($col,$ins,$sec){
        if($sec != ""){
            $query = $this->db->query("SELECT * FROM  progress_items_tbl LEFT JOIN progress_tbl ON progress_items_tbl.progress_no = progress_tbl.id LEFT JOIN students_tbl ON progress_tbl.student_no = students_tbl.id WHERE students_tbl.section = '$sec' && students_tbl.instructor_id = $ins && progress_items_tbl.exam_content_no = $col && progress_items_tbl.evaluation =  'correct'");
        }else{
            $query = $this->db->query("SELECT * FROM  progress_items_tbl LEFT JOIN progress_tbl ON progress_items_tbl.progress_no = progress_tbl.id LEFT JOIN students_tbl ON progress_tbl.student_no = students_tbl.id WHERE students_tbl.instructor_id = $ins && progress_items_tbl.exam_content_no = $col && progress_items_tbl.evaluation =  'correct'");
        }
        
        return $query->result_object();
    }
    function get_custom_fail($col,$ins,$sec){
        if($sec != ""){
            $query = $this->db->query("SELECT * FROM  progress_items_tbl LEFT JOIN progress_tbl ON progress_items_tbl.progress_no = progress_tbl.id LEFT JOIN students_tbl ON progress_tbl.student_no = students_tbl.id WHERE students_tbl.section = '$sec' && students_tbl.instructor_id = $ins && progress_items_tbl.exam_content_no = $col && progress_items_tbl.evaluation =  'incorrect'");
        }else{   
            $query = $this->db->query("SELECT * FROM  progress_items_tbl LEFT JOIN progress_tbl ON progress_items_tbl.progress_no = progress_tbl.id LEFT JOIN students_tbl ON progress_tbl.student_no = students_tbl.id WHERE students_tbl.instructor_id = $ins && progress_items_tbl.exam_content_no = $col && progress_items_tbl.evaluation =  'incorrect'");
        }
        return $query->result_object();
    }
}