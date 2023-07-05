<?php
    Class Deleteuser extends CI_Controller {

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
        public function delete($user_id)
        {
            $this->User_model->delete_user($user_id);
            redirect('user');
        }

    }
?>