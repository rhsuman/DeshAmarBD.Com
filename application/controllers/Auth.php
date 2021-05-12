<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Auth
 *
 * @author suman
 */
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function register() {
        $this->is_login();
        //Form Validation
        $this->form_validation->set_rules('username', 'Username', 'trim|min_length[5]|max_length[12]|required|is_unique[auth.username]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|is_unique[auth.email]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');
        //Load Page
        if ($this->form_validation->run() === false) {
            $data['title'] = 'User Registration';
            $data['settings'] = $this->settings_model->get_setting();
            //$this->load->view('admin/template/_header', $data);
            $this->load->view('auth/register-page', $data);
            //$this->load->view('admin/template/_footer', $data);
        } else {
            //Get User Email
            $email = $this->input->post('email', true);
            //Create Token
            $token = generate_unique_id();
            //user register model
            if ($this->auth_model->register()) {
                //last id
                $last_id = $this->db->insert_id();
                //Add Token
                $this->auth_model->token($email, $token);
                //send token by email
                $this->_sendEmail($token, 'verify');
                // Set message
                $this->session->set_flashdata('msg', '<div class="alert alert-success">You registration is submited Check Your mail</div>');
                //redirect login page
                redirect('login');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">You registration failed </div>');
                redirect($this->agent->referrer());
            }
        }
    }

    //Login
    public function login() {
        $this->is_login();
        //Form Validation
        $this->form_validation->set_rules('email', 'Email', 'xss_clean|required', array(
            'required' => 'You have not provided %s.',
                )
        );
        $this->form_validation->set_rules('password', 'Password', 'xss_clean|required', array(
            'required' => 'You have not provided %s.',
        ));
        //Form Validation Run
        if ($this->form_validation->run() === FALSE) {
            //Title
            $data['title'] = 'Login to your account';

            $data['settings'] = $this->settings_model->get_setting();
            $this->load->view('auth/login-page', $data);
        } else {
            //Username/Password
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);
            // Login By Model
            $result = $this->auth_model->validate_login($email, $password);

            if ($result) {
                // Create session
                $data = array(
                    'email' => $result[0]->email,
                    'name' => $result[0]->name,
                    'username' => $result[0]->username,
                    'role' => $result[0]->role,
                    'avatar' => $result[0]->avatar,
                    'user_id' => $result[0]->id,
                    'logged_in' => TRUE,
                );

                if ($remember) {
                    $this->session->set_userdata('remember', 1);
                    $cookie = $this->input->cookie('ci_session'); // we get the cookie
                    $this->input->set_cookie('ci_session', $cookie, '604800'); // and add one week to it's expiration
                }
                $this->session->set_userdata($data);
                if ($data['role'] === 'admin') {
                    redirect('dashboard');
                } else {
                    redirect(base_url());
                }
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Successfully Logid In</div>');
                redirect('profile/' . $this->session->userdata('user_id'));
            } else {
                // Set message
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Username Or Password is invalid/ Banned</div>');

                redirect($this->agent->referrer());
            }
        }
    }

    // Log user out
    public function logout() {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        // Set message
        $this->session->set_flashdata('msg', '<div class="alert alert-info">You are now logged out</div>');

        redirect($this->agent->referrer());
    }

    private function is_login() {
        // Check login
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin');
            } else {
                redirect('profile/' . $this->session->userdata('user_id'));
            }
        }
    }

    //Send Mail
    private function _sendEmail($token, $type) {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'https://mail.deshamarbd.com:2080',
            'smtp_user' => 'admin.deshamarbd.com',
            'smtp_pass' => 'rh.Sum@n7676',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->from('admin@deshamarbd.com', 'DeshAmarBD');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/reset?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    //Verify Account
    public function verify() {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('auth', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if ($user_token) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('auth');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('login');
                } else {
                    $this->db->delete('auth', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect(base_url());
        }
    }

    //Forget Password
    public function forget() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Users';

            $data['settings'] = $this->settings_model->get_setting();
            $this->load->view('admin/template/_header', $data);
            $this->load->view('auth/forget-password', $data);
            $this->load->view('admin/template/_footer', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('auth', ['email' => $email, 'activation' => 1])->row_array();

            if ($user) {
                $token = generate_unique_id();
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', 'Please check your email to reset your password!');
                redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('message', 'Email is not registered or activated!');
                redirect($this->agent->referrer());
            }
        }
    }

    //reset Password
    public function reset() {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('auth', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('login');
        }
    }

    //Change Password
    public function changePassword() {
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $data['settings'] = $this->settings_model->get_setting();
            $this->load->view('auth/change_password', $data);
        } else {
            $password = md5($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('auth');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', 'Password has been changed! Please login.');
            redirect('login');
        }
    }

    //User Profile
    public function profile($id) {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $data['user'] = $this->auth_model->get_usersname($id);
        $data['title'] = $data['user']->username;
        $data['settings'] = $this->settings_model->get_setting();
        $data['content'] = $this->load->view('auth/profile', $data, true);
        $this->load->view('admin/index', $data);
    }

    function update() {
        $data = array();
        $id = $this->input->post('id', true);
        $data['full_name'] = $this->input->post('full_name', true);
        $data['about_me'] = $this->input->post('about_me', true);
        $data['facebook_url'] = $this->input->post('facebook_url', true);
        $data['twitter_url'] = $this->input->post('twitter_url', true);
        $data['instagram_url'] = $this->input->post('instagram_url', true);
        $data['pinterest_url'] = $this->input->post('pinterest_url', true);
        $data['linkedin_url'] = $this->input->post('linkedin_url', true);
        $data['telegram_url'] = $this->input->post('telegram_url', true);
        $data['youtube_url'] = $this->input->post('youtube_url', true);
        $this->auth_model->update($data, $id);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Update User Successfully !<div>');
        redirect($this->agent->referrer());
    }

    //User List
    public function users() {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        $data['title'] = 'Users';
        $data['settings'] = $this->settings_model->get_setting();
        $data['users'] = $this->auth_model->get_users();
        $data['content'] = $this->load->view('auth/users', $data, true);
        $this->load->view('admin/index', $data);
    }

    //inactive_user
    public function unpublish($id) {
        $this->auth_model->inactive_user($id);
        $this->session->set_flashdata('msg', 'Your User has been Banned');
        redirect($this->agent->referrer());
    }

    //active_user
    public function publish($id) {
        $this->auth_model->active_user($id);
        $this->session->set_flashdata('msg', 'Your User has been Active');
        redirect($this->agent->referrer());
    }

}
