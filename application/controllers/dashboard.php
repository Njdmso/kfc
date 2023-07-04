<?php
    class Dashboard extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $this->load->view('show_dashboard', $data);
            }else{
                redirect('login');
            }
            
        }

        public function logout() {
            $this->session->unset_userdata('user'); 
            redirect('login');
        }
    }
?>