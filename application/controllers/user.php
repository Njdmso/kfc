<?php
    class User extends CI_controller {

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
    }
?>