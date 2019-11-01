<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Users extends CI_Controller {
        //Register User
        public function register() {
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
            $this->form_validation->set_rules('email','Email','required|valid_email|callback_check_email_exists');
            $this->form_validation->set_rules('password','Password','required|min_length[6]');
            $this->form_validation->set_rules('password2','Confirm Password','required|matches[password]');

            //Run the validation
            if($this->form_validation->run() === FALSE) {
                //Load the views
                $this->load->view('templates/header');
                $this->load->view('users/register',$data);
                $this->load->view('templates/footer');
            } else {
                // Encrypt Password
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);
                //Set message
                $this->session->set_flashdata('user_registered','You are now registered and can log in');

                redirect('users/login');
            }
        }

          //Log In User
          public function login() {
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            //Run the validation
            if($this->form_validation->run() === FALSE) {
                //Load the views
                $this->load->view('templates/header');
                $this->load->view('users/login',$data);
                $this->load->view('templates/footer');
            } else {
                //Get username
                $username = $this->input->post('username');
                //Get and encrypt the password
                $password = md5($this->input->post('password'));
                //Login User
                $user_id = $this->user_model->login($username, $password);

                if($user_id) {
                    //Create session
                    $user_data = [
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    ];

                    $this->session->set_userdata($user_data);
                    //Set message
                    $this->session->set_flashdata('login_success','You are now logged in');

                    redirect('posts');
                } else {

                      //Set message
                    $this->session->set_flashdata('login_failed','Incorrect Username or Password');

                    redirect('users/login');
                }

            }
        }

        //Logged out user
        public function logout() {
            //Unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_data');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('logout_success','You are now logged out');

            //Redirect back to login
            redirect('users/login');

        }
        //Custom function for checking if username exists
        public function check_username_exists($username) {
            $this->form_validation->set_message('check_username_exists','Username is already taken, pick another one');
            
            if($this->user_model->check_username_exists($username)) {
                return true;
            } else {
                return false;
            }
        }

        //Custom function for checking if username exists
        public function check_email_exists($email) {
            $this->form_validation->set_message('check_email_exists','Email Address is already taken, pick another one');
            
            if($this->user_model->check_email_exists($email)) {
                return true;
            } else {
                return false;
            }
        }
    }




?>