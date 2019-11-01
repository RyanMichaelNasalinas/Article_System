<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Posts extends CI_Controller {

        public function index($offset = 0) {
            //Pagination  Congfig
            $config['base_url'] = base_url() . 'posts/index/';
            $config['total_rows'] = $this->db->count_all('posts');
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;//posts/index/3 - Third parameter will the segment so it return 3
            $config['attributes'] = ['class' => 'pagination-links']; 
            //Initialze Pagination
            $this->pagination->initialize($config);
            //End pagination initialization

            $data['title'] = "Lastest Post";
            $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'],$offset);

            //Load views header,footer and views
            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }
        //Get the url title
        public function view($url_title = NULL) {
            $data['post'] = $this->post_model->get_posts($url_title);
            //Get the comments from comments
            $post_id = $data['post']['id'];
            $data['comments'] = $this->comment_model->get_comments($post_id);

            if(empty($data['post'])) {
                show_404();
            }
            $data['title'] = $data['post']['title'];

             //Load views header,footer and views
             $this->load->view('templates/header');
             $this->load->view('posts/view', $data);
             $this->load->view('templates/footer');
        }

        //Create Post
        public function create() {

            //Check if the user is logged in
            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = "Create Post";

            $data['categories'] = $this->post_model->get_categories();

            //Create rules for form validation
            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('body','Body','required');

            if($this->form_validation->run() === FALSE) {
                //Load views header,footer and views
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                //Upload image
                $config['upload_path'] = './assets/images/posts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                //Load upload library
                $this->load->library('upload',$config);

                if(!$this->upload->do_upload()) {
                    $errors = ['error'=> $this->upload->display_errors()];
                    $post_image = 'noimage.jpg';
                } else {
                    $data = ['upload_data' => $this->upload->data()];
                    $post_image = $_FILES['userfile']['name'];
                }
                $this->post_model->create_post($post_image);

                //Set message
                $this->session->set_flashdata('post_created','Your post has been created');

                redirect('posts');
            }
        }

        //Delete post
        public function delete($id) {
            //Check if the user is logged in
            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->post_model->delete_post($id);

             //Set message
             $this->session->set_flashdata('post_deleted','Your post has been deleted');

            redirect('posts');
        }

        //Edit post
        public function edit($url_title) {
              //Check if the user is logged in
              if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['post'] = $this->post_model->get_posts($url_title);

            //Check user if he/she own the post
            if($this->session->userdata('user_id') != $this->post_model->get_posts($url_title)['user_id']) {
                redirect($this->posts);
            }

            $data['categories'] = $this->post_model->get_categories();

            if(empty($data['post'])) {
                show_404();
            }

            $data['title'] = 'Edit post';

             //Load views header,footer and views
             $this->load->view('templates/header');
             $this->load->view('posts/edit', $data);
             $this->load->view('templates/footer');
        }
        //Update post
        public function update() {
              //Check if the user is logged in
              if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

           $this->post_model->update_post();

           //Set message
           $this->session->set_flashdata('post_updated','Your post has been updated');
           redirect('posts');

        }
    }
?>