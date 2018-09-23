<?php
/**
 * Created by PhpStorm.
 * User: devesh
 * Date: 22/9/18
 * Time: 12:00 PM
 */

class Forum_model extends CI_Model
{
    public $api_send_data = array(
        'forum_questions.id as question_id',
        'forum_questions.doc as question_doc',
        'users.name as sender_name',
        'users.email as sender_email',
        'forum_questions.question as question',
        'forum_questions.likes as question_likes',
        'forum_questions.tags as question_tags'
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function is_exists($id){
        $table_name = 'forum_questions';
        $this->db->where('id', $id);
        $result = $this->db->get($table_name);
        return $result->num_rows() > 0;
    }
//    CRUD  ////////////////////////////////////////////////////////////////
    public function create_post($data)
    {
        $data['question'] = htmlspecialchars($data['question']);
        $this->db->insert('forum_questions', $data);
    }

    public function update_post($id, $data)
    {
        foreach ($data as $key => $val){
            $this->db->set($key, $val);
        }
        $this->db->where('id', $id);
        $result = $this->db->update('forum_questions');

        return $result;
    }

    public function retrieve_post($id)
    {
        $this->db->select()->from('forum_questions');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function delete_post($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('forum_questions');
    }
//          ////////////////////////////////////////////////////////////////



    public function get($id)
    {
        $this->db->select($this->api_send_data)->from('forum_questions');
        $this->db->join('users', 'users.id = forum_questions.user');
        $this->db->where('forum_questions.id', $id);
        return $this->db->get()->row();
    }

    public function all($paginate=null)
    {

        $this->db->select($this->api_send_data)->from('forum_questions');
        $this->db->join('users', 'users.id = forum_questions.user');
        $this->db->order_by('forum_questions.id DESC');
        if($paginate != null){
            $this->db->limit($paginate['per_page'], $paginate['offset']);
        }
        return $this->db->get()->result();
    }

    public function get_by_user($user_id, $paginate=null)
    {
        $this->db->select($this->api_send_data)->from('forum_questions');
        $this->db->join('users', 'users.id = forum_questions.user');
        $this->db->order_by('forum_questions.id DESC');
        $this->db->where('user', $user_id);

        if($paginate != null){
            $this->db->limit($paginate['per_page'], $paginate['offset']);
        }

        return $this->db->get()->result();
    }




    public function get_all_reply_on($question_id, $paginate=null)
    {

        $this->db->select('email, likes, comment')->from('forum_comments');
        $this->db->join('users', 'users.id = forum_comments.user');
//        $this->db->join('forum_questions', 'forum_questions.id = forum_comments.question_id');
        $this->db->where('forum_comments.question_id', $question_id);
        $this->db->order_by('forum_comments.likes DESC');
        if($paginate != null){
            $this->db->limit($paginate['per_page'], $paginate['offset']);
        }
        return $this->db->get()->result();
    }


}
