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
//        $this->load->view('index');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('forum_model');
        $this->load->library('email');

        $this->help = array(
            'methods' => array(
                'all',
                'get/id',
                'user_get/user_id',
                'update/id/question',
                'delete/id',
                'create'
            )
        );
    }


    public function index()
    {
        jsonResponse($this, $this->help);
    }

    public function all()
    {

        $posts = $this->forum_model->all($this->paginate);
        $res = array(
            'status' => 'success',
            'data' => $posts,
            'paginate' => $this->paginate
        );

        jsonResponse($this, $res);
    }

    public function get($id = NULL)
    {
        $res = array(
            'status' => 'searching'
        );

        if ($id == NULL) {
            $res['error'] = '\'id\' required';
            $res['help'] = $this->help;

        } else {
            $posts = $this->forum_model->get($id);
            if ($posts == null) {
                $res['error'] = 'id dose not match ';
            } else {
                $res['status'] = 'success';
            }
            $res['data'] = $posts;
        }
        jsonResponse($this, $res);
    }

    public function user_get($user_id = NULL)
    {

        $res = array(
            'status' => 'searching',
            'data' => array(),
            'paginate' => $this->paginate
        );

        if ($user_id == NULL) {
            $res['error'] = '\'user_id\' required';
            $res['status'] = 'failed';
            $res['help'] = $this->help;

        } else {
            $posts = $this->forum_model->get_by_user($user_id, $this->paginate);
            $res['data'] = $posts;
            $res['status'] = 'success';
        }
        jsonResponse($this, $res);
    }


    public function delete($id = NULL)
    {
        $res = array();

        if ($id == NULL) {
            $res['error'] = 'question \'id\' required';
            $res['help'] = $this->help;

        } else {
            $this->forum_model->delete_post($id);
            $res['status'] = 'done';
            $res['msg'] = 'Question has been removed';
        }
        jsonResponse($this, $res);
    }


    public function update($id = NULL, $question)
    {
        $res = array(
            'status' => 'success'
        );

        $data = array(
            'question' => $question,
        );
        try {
            if ($this->forum_model->is_exists($id)) {
                $this->forum_model->update_post($id, $data);
            } else {
                throw new Exception('post \'id\' dose not found');
            }
        } catch (Exception $e) {
            $res['status'] = 'failed';
            $res['error'] = $e->getMessage();
        }

        jsonResponse($this, $res);
    }

    public function create()
    {

        $context = array();
        $user_id = $this->session->userdata('id');
        $question = $this->input->get('question');

        $context['question'] = $question;
        $context['status'] = 'success';

        $data = array(
            'id' => NULL,
            'user' => '22',
            'question' => $question,
            'likes' => '0',
            'tags' => ''
        );
        $this->forum_model->create_post($data);



        jsonResponse($this, $context);
    }



    public function testing()
    {
        $arr = array(
            'name' => 'pankaj',
            'age' => 20
        );

        jsonResponse($this, $arr);
    }

}

function jsonResponse($obj, $data, $code = 200)
{
    $obj->output->set_content_type('application/json')
        ->set_status_header($code)
        ->set_output(json_encode($data));
}



