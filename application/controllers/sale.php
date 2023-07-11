<?php
    class Sale extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Sale_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['sales'] = $this->Sale_model->get_sale();
                $this->load->view('show_sale', $data);
            }
            else{
                redirect('login');
            }
        }
    }
?>