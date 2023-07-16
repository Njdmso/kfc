<?php
    class Payroll extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Payroll_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['payrolls'] = $this->Payroll_model->get_payroll();
                $this->load->view('show_payroll', $data);
            }
            else{
                redirect('login');
            }
        }

        public function search() {
            $keyword = $this->input->post('keyword');
        
            // Perform the search
            $data['payrolls'] = $this->Payroll_model->search_payroll($keyword);
    
            $user = $this->session->userData('user');
            $data['user'] = $user; // Add this line to pass the $user variable to the view
        
            // Load the user list view with the search results
            $this->load->view('show_payroll', $data);
        }
    }
?>