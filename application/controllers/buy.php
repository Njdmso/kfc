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
    }
?>