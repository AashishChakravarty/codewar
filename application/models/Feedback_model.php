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
}
