<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Categories extends CI_Controller {

        public function index() {
            $data['title'] = 'Categories';
            $data['categories'] = $this->category_model->get_categories();

            //Load the header,footer and views
            $this->load->view('templates/header');//header
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');//header
        }
        //Create category
        public function create() {
              //Check if the user is logged in
              if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }
            
            $data['title'] = 'Create Category';
            //Create a category form validation
            $this->form_validation->set_rules('name','Name','required|min_length[4]');

            if($this->form_validation->run() === FALSE) {
                //Load the header,footer and views
                $this->load->view('templates/header');//header
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');//header
            } else {
                $this->category_model->create_category();
                //Set message
                $this->session->set_flashdata('category_created','Your category has been created');
                   
                redirect('categories');
            }
        }

        //Post function in category
        public function posts($id) {
            $data['title'] = $this->category_model->get_category($id)->name;

            //Get the post model
            $data['posts'] = $this->post_model->get_posts_by_category($id);
            //Load the header,footer and views
            $this->load->view('templates/header');//header
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');//header
        }

        //Delete category
        public function delete($id) {
            //Check if the user is logged in
            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->category_model->delete_category($id);

             //Set message
             $this->session->set_flashdata('category_deleted','Your category has been deleted');

            redirect('categories');
        }
    }
?>