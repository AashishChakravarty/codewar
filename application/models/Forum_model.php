<?php

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

    public function get_all_questions()
    {
        $this->db->select('forum_questions.id, forum_questions.user, forum_questions.question, forum_questions.likes, forum_questions.tags, users.name');
        $this->db->from('forum_questions');
        $this->db->join('users', 'users.id = forum_questions.user');
        $this->db->order_by('forum_questions.id DESC');
        $result = $this->db->get()->result();

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    public function user_questions($id)
    {
        $this->db->select()->from('forum_questions');
        $result = $this->db->get()->result();

        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    public function get_question_comment($q_id)
    {
        $this->db->select('forum_comments.id, forum_comments.user, forum_comments.comment, forum_comments.likes, users.name');
        $this->db->from('forum_comments');
        $this->db->join('users', 'users.id = forum_comments.user');
        $this->db->where('forum_comments.question_id', $q_id);
        return $this->db->get()->result();

        // if ($result) {
        //     return $result;
        // } else {
        //     return 0;
        // }
    }


//     public function get_all_reply_on($question_id, $paginate=null)
//     {

//         $this->db->select('email, likes, comment')->from('forum_comments');
//         $this->db->join('users', 'users.id = forum_comments.user');
// //        $this->db->join('forum_questions', 'forum_questions.id = forum_comments.question_id');
//         $this->db->where('forum_comments.question_id', $question_id);
//         $this->db->order_by('forum_comments.likes DESC');
//         if($paginate != null){
//             $this->db->limit($paginate['per_page'], $paginate['offset']);
//         }
//         return $this->db->get()->result();
//     }
}
