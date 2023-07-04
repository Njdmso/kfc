<?php
    class Updateuser extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $this->load->view('show_updateuser', $data);
            }else{
                redirect('login');
            }
            
        }

        public function update() {
            $this->load->model('User_model'); //Load the user_model
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'name' => $this->input->post('name'),
                'role' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),

            );
            $this->User_model->update_user(
                $data['user_id'],
                $data['name'],
                $data['role'],
                $data['username'],
                $data['password']
            );
            redirect('user');
        }
    }
?>