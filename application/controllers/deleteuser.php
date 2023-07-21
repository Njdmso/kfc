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


            $user = $this->session->userData('user');
        
            $this->load->model('User_model'); //Load the model
            $date = date('Y-m-d');
            $stat = "Delete User id " . $user_id;
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