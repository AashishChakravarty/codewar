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
        $this->load->view('team.php');
        // $email = $this->session->userdata('email');
        // if (isset($email)) {
        //     redirect(base_url('profile'));
        // }
        // else {
        //     $this->load->view('home');
        // }
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
                    'smtp_user' => '',
                    'smtp_pass' => '',
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

    public function update_password()
    {
        $email = $this->session->userdata('email');
        if (!isset($email)) {
            redirect(base_url('login'));
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('cpass', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('profile/update_password');
        } else {
            $id = $this->session->userdata('id');
            $password = $this->input->post('password');

            $update_data = $this->user_model->update_password($id, $password);
            if ($update_data) {
                $data = array(
                    'message' => 'Your Password Successfully Changed.'
                );
                $this->load->view('profile/profile', $data);
            } else {
                $data = array(
                    'message' => 'Something Went to Wrong. Please try again later.'
                );
                $this->view('profile/profile', $data);
            }   
        }
    }

    public function forget_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('forget-password');
        } else {
    
            $email = $this->input->post('email');

            $email_exist = $this->user_model->is_email_exist($email);

            if ($email_exist) {
                $date = new DateTime();
                $this->load->helper('string');
                $random_str = random_string('alnum', 16);
                $hash = md5($email_exist->id.$date->getTimestamp().$random_str);

                    // $link = 'http://192.168.2.131:4200/#/forgotReset?rt=' . $result->id .'_'. $hash ;
                    $link = base_url().'forget-reset/' . $email_exist->id .'/'. $hash ;

                    if($this->user_model->save_reset_link($email_exist->id, $hash)){

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
                            $this->email->to($email);
                            $this->email->subject('Reset Password');
                            $this->email->message('Reset link: '. $link);
                            
                            if ($this->email->send()) {
                                $data = array(
                                    'message' => 'Please Check Your email. We have sent reset password link to your email id.'
                                );
                                $this->load->view('login', $data);
                            } else {
                                $data = array(
                                    'message' => 'Something went to wrong. Please try again later.'
                                );
                                $this->load->view('login', $data);
                            }
                            
                    } else {
                        $data = array(
                            'message' => 'Something went to wrong. Please try again later.'
                        );
                        $this->load->view('login', $data);
                    }
            } else {
                $data = array(
                    'message' => 'Email Does not Exist.'
                );
                $this->load->view('login', $data);
            }
        }
    }

    public function forget_reset()
    {
        $this->load->helper('url');
        $id = $this->uri->segment(2);
        $hash = $this->uri->segment(3);

        if (isset($id)&&isset($hash)) {
            $reset_link = $this->user_model->reset_link($id, $hash);
            if ($reset_link) {

                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
                $this->form_validation->set_rules('cpass', 'Confirm Password', 'trim|required|matches[password]');
        
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('reset_password');
                } else {
                    $password = $this->input->post('password');
                    $link = null;

                    $update_data = $this->user_model->reset_password($id, $password, $link);
                    if ($update_data) {
                        $data = array(
                            'message' => 'Your Password Successfully Changed.'
                        );
                        $this->load->view('login', $data);
                    } else {
                        $data = array(
                            'message' => 'Something Went to Wrong. Please try again later.'
                        );
                        $this->load->view('login', $data);
                    }
                }
            } else {
                $data = array(
                    'message' => 'Link invalid'
                );
                $this->load->view('login', $data);
            }
            
        } else {
            $data = array(
                'message' => 'Link invalid.'
            );
            $this->view('login', $data);
        }
    }

    public function logout()
    {
        $array_items = array('id', 'name', 'email');
        $this->session->unset_userdata($array_items);
        $url= base_url(); 
        redirect($url);
    }

    // public function valid_domain($email)
    // {
    //     if(@checkdnsrr(array_pop(explode("@",$email)),"MX")){
    //         return 1;
    //     }else{
    //         return 0;
    //     }
    // }
}
