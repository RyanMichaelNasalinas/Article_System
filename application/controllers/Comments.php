<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Comments extends CI_Controller {

        public function create($post_id) {
            //Get the url_title set as hidden field
            $url_title = $this->input->post('url_title');
            $data['post'] = $this->post_model->get_posts($url_title);

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('body','Body','required');

            //Check if the validation is run
            if($this->form_validation->run() === FALSE) {
                //Load the views
                $this->load->view('templates/header');
                $this->load->view('posts/view',$data);
                $this->load->view('templates/footer');
            } else {
                $this->comment_model->create_comment($post_id);
                redirect('posts/'.$url_title); 
            }
        }

}












?>