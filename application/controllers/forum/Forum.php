<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{
    public $paginate = array(
        'per_page' => 5,
        'offset' => 0
    );

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        parent:: __construct();
        $this->load->helper('url');
        $this->load->view('index');
        $this->load->view('forum/navbar');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('forum_model');
        $this->load->library('email');

        // $this->help = array(
        //     'methods' => array(
        //         'all',
        //         'get/id',
        //         'user_get/user_id',
        //         'update/id/question',
        //         'delete/id',
        //         'create'
        //     )
        // );
    }


    // public function index()
    // {
    //     jsonResponse($this, $this->help);
    // }

    // public function all()
    // {

    //     $posts = $this->forum_model->all($this->paginate);
    //     $res = array(
    //         'status' => 'success',
    //         'data' => $posts,
    //         'paginate' => $this->paginate
    //     );

    //     jsonResponse($this, $res);
    // }

    public function add_question()
    {
        $id = $this->session->userdata('id');

        if(isset($id)){
            $this->form_validation->set_rules('question', 'Question', 'required|min_length[10]');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('forum/create-post');
            } else {
                $insert_data = [
                    'user' => $id,
                    'question' => $this->input->post('question'),
                    'likes' => 0
                ];

                $question_submit = $this->forum_model->create_question($insert_data);

                if ($question_submit) {
                    $data = array(
                        'message' => 'New Question Successfully Added'
                    );
                    // $this->load->view('create-post');
                    redirect(base_url('forum'));
                } else {
                    $data = array(
                        'message' => 'Something went to Wrong.'
                    );
                    $this->load->view('create-post', $data);
                }  
            }
        } else {
            $this->load->view('login');
        }
    }

    public function get_question($q_id = NULL)
    {        
        if (isset($q_id)) {
            $question = $this->forum_model->question($q_id);
            $comments = $this->forum_model->get_question_comment($q_id);

            if ($question) {
                $data = array(
                    'question' => $question,
                    'comments' => $comments
                );
                $this->load->view('forum/details', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function new_comment()
    {
        $id = $this->session->userdata('id');

        if (isset($id)) {
            $this->form_validation->set_rules('comment', 'Answer', 'required');
            $this->form_validation->set_rules('q_id', 'Question', 'required');

            $q_id = $this->input->post('q_id');

            if ($this->form_validation->run() == FALSE) {
                redirect(base_url('forum/details/'. $q_id));
                // $this->load->view('forum/details/'.$q_id);
            } else {
                $insert_data = [
                    'user' => $id,
                    'question_id' => $this->input->post('q_id'),
                    'comment' => $this->input->post('comment'),
                    'likes' => 0
                ];
                $comment_data = $this->forum_model->create_comment($insert_data);

                if ($insert_data) {
                    $data = array(
                        'message' => 'Your Comment Successfully Added'
                    );
                // $this->load->view('forum/details/'.$q_id, $data);
                redirect(base_url('forum/details/'. $q_id));
                } else {
                    $data = array(
                        'message' => 'Something went to wrong'
                    );
                redirect(base_url('forum/details/'. $q_id));
                }
            }
            
        } else {
            $this->load->view('login');
        }
    }

    public function all_questions()
    {
        $questions = $this->forum_model->get_all_questions();

        if ($questions) {
            $data = array(
                'questions' => $questions
            );
            $this->load->view('forum/home', $data);
        } else {
            $data = array(
                'message' => 'Question Not Found'
            );
            $this->load->view('forum/home', $data);
        }
    }

    public function get_user_questions()
    {
        $id = $this->session->userdata('id');
        if (isset($id)) {
            $questions_data = $this->forum_model->user_questions($id);

            if ($questions_data) {
                $data = array(
                    'questions' => $questions_data
                );
            } else {
                $data = array(
                    'message' => 'Questions Not Found'
                );
            }
            
        } else {
            $this->load->view('login');
        }
    }

    // public function user_get($user_id = NULL)
    // {

    //     $res = array(
    //         'status' => 'searching',
    //         'data' => array(),
    //         'paginate' => $this->paginate
    //     );

    //     if ($user_id == NULL) {
    //         $res['error'] = '\'user_id\' required';
    //         $res['status'] = 'failed';
    //         $res['help'] = $this->help;

    //     } else {
    //         $posts = $this->forum_model->get_by_user($user_id, $this->paginate);
    //         $res['data'] = $posts;
    //         $res['status'] = 'success';
    //     }
    //     jsonResponse($this, $res);
    // }


    // public function delete($id = NULL)
    // {
    //     $res = array();

    //     if ($id == NULL) {
    //         $res['error'] = 'question \'id\' required';
    //         $res['help'] = $this->help;

    //     } else {
    //         $this->forum_model->delete_post($id);
    //         $res['status'] = 'done';
    //         $res['msg'] = 'Question has been removed';
    //     }
    //     jsonResponse($this, $res);
    // }


    // public function update($id = NULL, $question)
    // {
    //     $res = array(
    //         'status' => 'success'
    //     );

    //     $data = array(
    //         'question' => $question,
    //     );
    //     try {
    //         if ($this->forum_model->is_exists($id)) {
    //             $this->forum_model->update_post($id, $data);
    //         } else {
    //             throw new Exception('post \'id\' dose not found');
    //         }
    //     } catch (Exception $e) {
    //         $res['status'] = 'failed';
    //         $res['error'] = $e->getMessage();
    //     }

    //     jsonResponse($this, $res);
    // }

    // public function create()
    // {

    //     $context = array();
    //     $user_id = $this->session->userdata('id');
    //     $question = $this->input->get('question');

    //     $context['question'] = $question;
    //     $context['status'] = 'success';

    //     $data = array(
    //         'id' => NULL,
    //         'user' => '22',
    //         'question' => $question,
    //         'likes' => '0',
    //         'tags' => ''
    //     );
    //     $this->forum_model->create_post($data);



    //     jsonResponse($this, $context);
    // }



    // public function testing()
    // {
    //     $arr = array(
    //         'name' => 'pankaj',
    //         'age' => 20
    //     );

    //     jsonResponse($this, $arr);
    // }

}

// function jsonResponse($obj, $data, $code = 200)
// {
//     $obj->output->set_content_type('application/json')
//         ->set_status_header($code)
//         ->set_output(json_encode($data));
// }



