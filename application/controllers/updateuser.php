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
                $this->load->view('show_user', $data);
            }else{
                redirect('login');
            }
            
        }

        public function update() {
            $this->load->model('User_model'); //Load the user_model
            $ediuser ="";
            $data = array(
                $ediuser = $this->input->post('user_id'),
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


            $user = $this->session->userData('user');
        
            $this->load->model('User_model'); //Load the model
            $date = date('Y-m-d');
            $stat = "Edit User id " . $ediuser;
            $data = array(
                'user' => $user['name'],
                'status' => $stat,
                'date' => $date
    
            );
            $this->User_model->create_audit(
                $data['user'],
                $data['status'],
                $data['date']
            );

            redirect('user');
        }
    }
?>