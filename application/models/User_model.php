<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model {

        public function register($enc_password) {
            //User data
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'authentication' => $this->input->post('authentication')
            ];
            return $this->db->insert('users', $data);
        }
        //Log user in
        public function login($username,$password) {
            //Validate username & password
            $this->db->where('username',$username);
            $this->db->where('password',$password);

            $result =$this->db->get('users');

            if($result->num_rows() == 1) {
                return $result->row(0)->id;
            } else {
                return false;
            }
        }
        
        //  Check username exists
        public function check_username_exists($username) {
            $query = $this->db->get_where('users',['username'=> $username]);

            if(empty($query->row_array())) {
                return true; 
            } else {
                return false;
            }
        }

        //  Check username exists
        public function check_email_exists($email) {
            $query = $this->db->get_where('users',['email'=> $email]);

            if(empty($query->row_array())) {
                return true; 
            } else {
                return false;
            }
        }
    }


?>