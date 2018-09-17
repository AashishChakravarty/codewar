<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function user_register($data)
    {
        $result = $this->db->insert('users',$data);
	    if($result){
     		return $result;
     	}else{
     		return 0;
     	}
    }

    public function user_login($email, $password)
    {
        $this->db->select('id, name, email')->from('users');
        $this->db->where('email',$email);
        $this->db->where('password', $password);
        $res = $this->db->get()->row();
         
        if ($res) {
            return $res;
        } else {
            return 0;
        }
    }

    public function is_email_exist($email)
    {
        $this->db->select('id, email')->from('users');
        $this->db->where('email', $email);
        $res = $this->db->get()->row();

        if ($res) {
            return $res;
        } else {
            return 0;
        }
    }

    public function update_password($email, $password)
    {
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $result = $this->db->update('users');

        if ($result) {
            return $result;
        } else {
            return 0;
        }
        
    }

    // public function save_reset_hash($id, $hash)
    // {
    //     $this->db->where('user_id',$id);
    // 	$res = $this->db->update('tbl_users',array('user_reset_hash' => $hash));
    // 	if($res){
    //  		return $res;
    //  	}else{
    //  		return 0;
    //  	}
    // }

    // public function user_profile($email)
    // {
    //     $this->db->select()->from('tbl_users');
    //     $this->db->where('user_mail', $email);
    //     $result = $this->db->get()->row();

    //     if ($result) {
    //         return $result;
    //     } else {
    //         return 0;
    //     }
    // }
}
