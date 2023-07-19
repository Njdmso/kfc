<?php
    class Expense extends CI_controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Buy_model');
            $this->load->model('Expense_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['daily_sales'] = $this->Expense_model->get_dsales();
                $data['monthly_sales'] = $this->Expense_model->get_msales();
                $transactions = $this->Buy_model->get_buy();
                $data['transactions'] = $transactions;
                $this->load->view('show_expense', $data);
            }
            else{
                redirect('login');
            }
        }
    }
?>