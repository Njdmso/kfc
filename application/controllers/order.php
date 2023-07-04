<?php
    class Order extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Order_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['orders'] = $this->Order_model->get_order();
                $this->load->view('show_order', $data);
            }
            else{
                redirect('login');
            }
        }
    }
?>