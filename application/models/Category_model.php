<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Category_model extends CI_Model {
        //Show all categories
        public function create_category() {
            $data = [
                'name' => ucfirst($this->input->post('name')),
                'user_id' => $this->session->userdata('user_id')
            ];
            return $this->db->insert('categories',$data);
        }
        //Get categories
        public function get_categories() {
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        //Get category in categories/posts/$1
        public function get_category($id) {
            $query = $this->db->get_where('categories',['id' => $id]);
            return $query->row();
        }

         //Delete post
         public function delete_category($id) {
            $this->db->where('id',$id);
            $this->db->delete('categories');
            return true;
        }
 
    }   