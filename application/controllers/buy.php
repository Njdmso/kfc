<?php
    class Buy extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Buy_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['buys'] = $this->Buy_model->get_buy();
                $this->load->view('show_buy', $data);
            }
            else{
                redirect('login');
            }
        }

        public function search() {
            $keyword = $this->input->post('keyword');
        
            // Perform the search
            $data['buys'] = $this->Buy_model->search_buy($keyword);
    
            $user = $this->session->userData('user');
            $data['user'] = $user; // Add this line to pass the $user variable to the view
        
            // Load the user list view with the search results
            $this->load->view('show_buy', $data);
        }
    }
?>