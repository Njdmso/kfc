<?php
    class Pay extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Pay_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['pays'] = $this->Pay_model->get_pay();
                $this->load->view('show_pay', $data);
            }
            else{
                redirect('login');
            }
        }

        public function update() {
            $this->load->model('Pay_model'); //Load the pay_model
            $data = array(
                'pay_id' => $this->input->post('pay_id'),
                'status' => $this->input->post('status'),

            );
            $this->Pay_model->update_pay(
                $data['pay_id'],
                $data['status']
            );

            $this->Pay_model->delete_pay($data['pay_id']);

            redirect('pay');
        }

        public function delete($pay_id)
        {
            $this->User_model->delete_pay($pay_id);
            redirect('pay');
        }

        public function search() {
            $keyword = $this->input->post('keyword');
        
            // Perform the search
            $data['pays'] = $this->Pay_model->search_pay($keyword);
    
            $user = $this->session->userData('user');
            $data['user'] = $user; // Add this line to pass the $user variable to the view
        
            // Load the user list view with the search results
            $this->load->view('show_pay', $data);
        }
    }
?>