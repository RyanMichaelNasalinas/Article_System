<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Post_model extends CI_Model {
        //Show all posts
        public function get_posts($url_title = FALSE, $limit = FALSE, $offset = FALSE) {
            //Check if limit is pass in
            if($limit) {
                $this->db->limit($limit, $offset);
            }
            
            if($url_title == FALSE) {
                $this->db->order_by('posts.id','DESC');
                $this->db->join('categories','categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }   
            $query = $this->db->get_where('posts',['url_title' => $url_title]);
            return $query->row_array();
        }
        //Create/Add new post
        public function create_post($post_image) {
            $url_title = url_title($this->input->post('title'));

            $data = [
                'title' => ucfirst($this->input->post('title')),
                'url_title' => $url_title,
                'body' => ucfirst($this->input->post('body')),
                'category_id' => ucfirst($this->input->post('category_id')),
                'user_id' => $this->session->userdata('user_id'),
                'post_image' => $post_image
            ];

            return $this->db->insert('posts',$data);
        }
        //Delete post
        public function delete_post($id) {
            $image_file_name = $this->db->select('post_image')->get_where('posts', ['id' => $id])->row()->post_image;
            $cwd = getcwd(); //Save the current working directory
            $image_file_path = $cwd."\\assets\\images\\posts\\";
            chdir($image_file_path);
            unlink($image_file_path);
            chdir($cwd); //Restore the previous working directory

            $this->db->where('id',$id);
            $this->db->delete('posts');
            return true;
        }
        //Update Post
        public function update_post() {
            $url_title = url_title($this->input->post('title'));
            
            $data = [
                'title' => $this->input->post('title'),
                'url_title' => $url_title,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            ];

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts',$data);
        }

        //Get categories
        public function get_categories() {
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        //Get the post model
        public function get_posts_by_category($category_id) {
            $this->db->order_by('posts.id', 'DESC');
            //Join the categories
            $this->db->join('categories','categories.id = posts.category_id');
                $query = $this->db->get_where('posts',['category_id' => $category_id]);
                return $query->result_array();
        } 
        
    }
?> 