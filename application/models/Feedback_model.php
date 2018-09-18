<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function feedback_submit($data)
    {
        $result = $this->db->insert('feedback',$data);
	    if($result){
     		return $result;
     	}else{
     		return 0;
     	}
    }

    public function class_list()
    {
        $this->db->select('id, class_topic')->from('classes');
        $result = $this->db->get()->result_array();

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    public function is_unique_feedback($id, $class)
    {
        $this->db->select('user_id, class')->from('feedback');
        $this->db->where('user_id', $id);
        $this->db->where('class', $class);
        $result = $this->db->get()->row();

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
}
