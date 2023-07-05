<?php
    class Searchuser extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('User_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['users'] = $this->User_model->get_user();
                $this->load->view('show_user', $data);
            }
            else{
                redirect('login');
            }
        }
        public function search() {
            $keyword = $this->input->post('keyword');
        
            // Perform the search
            $data['users'] = $this->User_model->search_user($keyword);
    
            $user = $this->session->userData('user');
            $data['user'] = $user; // Add this line to pass the $user variable to the view
        
            // Load the user list view with the search results
            $this->load->view('show_user', $data);
        }
    }
?>