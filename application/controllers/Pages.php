<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Pages extends CI_Controller {

        public function view($page = 'home') {
            //Check if the view is existing
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
                show_404();
            }
            //Pass data to the view
            $data['title'] = ucfirst($page);

            //Load the header,footer and views
            $this->load->view('templates/header');//header
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');//header   
        }
    }
?>