<?php
    class Searchproduct extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Product_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['products'] = $this->Product_model->get_product();
                $this->load->view('show_product', $data);
            }
            else{
                redirect('login');
            }
        }
        
        public function search() {
            $keyword = $this->input->post('keyword');
        
            // Perform the search
            $data['products'] = $this->Product_model->search_product($keyword);
    
            $user = $this->session->userData('user');
            $data['user'] = $user; // Add this line to pass the $user variable to the view
        
            // Load the user list view with the search results
            $this->load->view('show_product', $data);
        }

    }
?>