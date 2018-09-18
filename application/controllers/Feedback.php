<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->view('index');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('feedback_model');
        $this->load->library('email');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        if (!isset($email)) {
            redirect(base_url('user/User/login'));
        }
        else {
            $this->load->view('feedback/feedback');
        }
    }

    public function feedback_submit()
    {
        $email = $this->session->userdata('email');
        if (!isset($email)) {
            redirect(base_url('User/login'));
        }

        $this->form_validation->set_rules('class', 'Class', 'trim|required');
        $this->form_validation->set_rules('q1', 'Q.1', 'trim|required');
        $this->form_validation->set_rules('q2', 'Q.2', 'trim|required');
        $this->form_validation->set_rules('q3', 'Q.3', 'trim|required');
        $this->form_validation->set_rules('q4', 'Q.4', 'trim|required');
        $this->form_validation->set_rules('q5', 'Q.5', 'trim|required');
        $this->form_validation->set_rules('q6', 'Q.6', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('feedback/feedback');            
        } else {

            $feedback_data = [
                'user_id' => $this->session->userdata('id'),
                'class' => $this->input->post('class'),
                'q1' => $this->input->post('q1'),
                'q2' => $this->input->post('q2'),
                'q3' => $this->input->post('q3'),
                'q4' => $this->input->post('q4'),
                'q5' => $this->input->post('q5'),
                'q6' => $this->input->post('q6'),
                'suggestion' => $this->input->post('suggestion')
            ];

            $result = $this->feedback_model->feedback_submit($feedback_data);

            if($result){
                $data = array(
                    'message' => 'Your Feedback Successfully Recorded' 
                );
                $this->load->view('profile/profile', $data);
            }
            else {
                $data = array(
                    'message' => 'Something Went to wrong. Please try again later.' 
                );
                $this->load->view('feedback/feedback', $data);            

            }
        }
    }
}
