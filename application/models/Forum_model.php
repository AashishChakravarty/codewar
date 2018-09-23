<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 22/9/18
 * Time: 12:00 PM
 */

class Forum_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create_question($data)
    {
        $result = $this->db->insert('forum_questions', $data);

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    public function question($id)
    {
        $this->db->select('forum_questions.id, forum_questions.user, forum_questions.question, forum_questions.likes, forum_questions.tags, users.name');
        $this->db->from('forum_questions');
        $this->db->join('users', 'users.id = forum_questions.user');
        $this->db->where('forum_questions.id', $id);
        $result = $this->db->get()->row();

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    public function create_comment($data)
    {
        $result = $this->db->insert('forum_comments', $data);

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }


//     public function is_exists($id){
//         $table_name = 'forum_questions';
//         $this->db->where('id', $id);
//         $result = $this->db->get($table_name);
//         return $result->num_rows() > 0;
//     }
// //    CRUD  ////////////////////////////////////////////////////////////////
//     public function create_post($data)
//     {
//         $data['question'] = htmlspecialchars($data['question']);
//         $this->db->insert('forum_questions', $data);
//     }

//     public function update_post($id, $data)
//     {
//         foreach ($data as $key => $val){
//             $this->db->set($key, $val);
//         }
//         $this->db->where('id', $id);
//         $result = $this->db->update('forum_questions');

//         return $result;
//     }

//     public function retrieve_post($id)
//     {
//         $this->db->select()->from('forum_questions');
//         $this->db->where('id', $id);
//         return $this->db->get()->row();
//     }

//     public function delete_post($id)
//     {
//         $this->db->where('id', $id);
//         $this->db->delete('forum_questions');
//     }
// //          ////////////////////////////////////////////////////////////////


//     public function all($paginate=null)
//     {

//         $this->db->select($this->api_send_data)->from('forum_questions');
//         $this->db->join('users', 'users.id = forum_questions.user');
//         $this->db->order_by('forum_questions.id DESC');
//         if($paginate != null){
//             $this->db->limit($paginate['per_page'], $paginate['offset']);
//         }
//         return $this->db->get()->result();
//     }

//     public function get_by_user($user_id, $paginate=null)
//     {
//         $this->db->select($this->api_send_data)->from('forum_questions');
//         $this->db->join('users', 'users.id = forum_questions.user');
//         $this->db->order_by('forum_questions.id DESC');
//         $this->db->where('user', $user_id);

//         if($paginate != null){
//             $this->db->limit($paginate['per_page'], $paginate['offset']);
//         }

//         return $this->db->get()->result();
//     }


}
