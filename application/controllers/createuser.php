<?php
    class Createuser extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $this->load->view('show_createuser', $data);
            }else{
                redirect('login');
            }
            
        }

        public function add() {
            $this->load->model('User_model'); //Load the user_model
            $data = array(
                'name' => $this->input->post('name'),
                'role' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),

            );
            $this->User_model->create_user(
                $data['name'],
                $data['role'],
                $data['username'],
                $data['password']
            );
            redirect('user');
        }
    }
?>