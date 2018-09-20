<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->view('index');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->library('email');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        if (isset($email)) {
            redirect(base_url('profile'));
        }
        else {
            $this->load->view('home');
        }
    }

	public function register()
	{
        $email = $this->session->userdata('email');
        if (isset($email)) {
            redirect(base_url('profile'));
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'trim|required|matches[password]|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('signup');
        } else {
            $email_unique = $this->user_model->is_email_exist($this->input->post('email'));

            if (!$email_unique) {
                $insert_data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'role' => 'user'
                ];

                $register_data = $this->user_model->user_register($insert_data);

                if ($register_data) {

                    $this->email->initialize(array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.sendgrid.net',
                    'smtp_user' => 'aashish_chakravarty',
                    'smtp_pass' => 'Aashish@23',
                    'smtp_port' => 587,
                    'crlf' => "\r\n",
                    'newline' => "\r\n"
                    ));

                    $this->email->from('support@codewar.me', 'Codewar');
                    $this->email->to($insert_data['email']);
                    $this->email->subject('Confirm your email address');
                    $this->email->message('Email Verification');
                    $this->email->send();

                    $data = array(
                        'message' => 'Your Account Succesfully Registered. Please Login.'
                    );

                    $this->load->view('login', $data);
                } else {
                    $data = array(
                        'message' => 'Something went to wrong. Please try again later.'
                    );

                    $this->load->view('signup', $data);
                }
                
            } else {
                $data = array(
                    'message' => 'Your Email Already Registered. Please Login'
                );

                $this->load->view('signup', $data);
            }
        }
    }
    
    public function user_login()
    {
        $email = $this->session->userdata('email');
        if (isset($email)) {
            redirect(base_url('profile'));
        }
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');            
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $login_data = $this->user_model->user_login($email, $password);

            if ($login_data) {
                $data = array(
                    'id' => $login_data->id,
                    'name' => $login_data->name,
                    'email'=> $login_data->email
                );

                $this->session->set_userdata($data);

                // $this->load->view('profile/profile', $data);

                redirect(base_url('profile'));
            } else {

                $data = array(
                    'message' => 'Wrong username or password.'
                );
                $this->load->view('login', $data);
            }
        }
    }
    public function profile()
    {
        $email = $this->session->userdata('email');
        if (!isset($email)) {
            redirect(base_url('login'));
        }
        else {
            $this->load->view('profile/profile');
        }
    }

    // public function update_password()
    // {
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');
    //     $this->form_validation->set_rules('cpass', 'Confirm Password', 'trim|required|matches[password]');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('profile/profile');
    //     } else {
    //         $email = $this->session->userdata('email');
    //         $password = $this->input->post('password');

    //         $this->user_model->update_password($email, $password);
    //     }

    // }

    public function logout()
    {
        $array_items = array('id', 'name', 'email');
        $this->session->unset_userdata($array_items);
        $url= base_url(); 
        redirect($url);
    }
}
