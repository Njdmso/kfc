<?php
    class Analytics extends CI_controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Order_model');
            $this->load->model('Analytics_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['daily_sales'] = $this->Analytics_model->get_dsales();
                $data['monthly_sales'] = $this->Analytics_model->get_msales();
                $transactions = $this->Order_model->get_order();
                $data['transactions'] = $transactions;
                $this->load->view('show_analytics', $data);
            }
            else{
                redirect('login');
            }
        }
    }
?>