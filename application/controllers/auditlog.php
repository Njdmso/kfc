<?php
    class Auditlog extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Audit_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['audits'] = $this->Audit_model->get_audit();
                $this->load->view('show_audit', $data);
            }
            else{
                redirect('audit');
            }
        }
    }
?>