<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller
{

    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('url');
//        $this->load->view('index');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('forum_model');
        $this->load->library('email');
    }

    public function index()
    {
        $context = array(
            'questions' => $this->forum_model->all()
        );
        // $this->load->view('forum/home', $context);
        $this->load->view('forum/index', $context);
    }


    public function reply($question_id=null){
        if($question_id == null){
            redirect(base_url('Forum'));
        }

        $context = array(
            'question' => $this->forum_model->get($question_id),
            'comments' => $this->forum_model->get_all_reply_on($question_id)
        );
        // $this->load->view('forum/home', $context);
        $this->load->view('forum/reply', $context);
    }

    function create_post()
    {

        $context = array();
        $email = $this->session->userdata('email');
        $user_id = $this->session->userdata('id');


        if (isset($email)) {
            $this->form_validation->set_rules('question', '\'question\'', 'required');
//            $this->form_velidation->set_rules('question', '\'question\'', 'required');

            $context['data']['testing'] = 'tested';

            if ($this->form_validation->run() == FALSE) {
                $context['data']['is_valid'] = FALSE;

            } else {
                $question = $this->input->post('question');

                $context['data']['is_valid'] = TRUE;
                $context['data']['question'] = $question;

                $data = array(
                    'id' => NULL,
                    'user' => $user_id,
                    'question' => $question,
                    'likes' => '5',
                    'tags' => ''
                );
                $this->forum_model->create_post($data);
            }
        }else{
            redirect(base_url('login'));
        }

        $this->load->view('test', $context);

        $this->show_all();
    }


    function show_all(){
        $posts = $this->forum_model->all();

        echo '<pre>';
        print_r($posts);
        echo '</pre>';
    }

}





