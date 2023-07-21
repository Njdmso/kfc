<?php
class Dashboard extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $user = $this->session->userData('user');
        if ($user) {
            $data['user'] = $user;
            $this->load->view('show_dashboard', $data);
        } else {
            redirect('login');
        }

    }

    public function logout()
    {
        $user = $this->session->userData('user');
        
        $this->load->model('Login_model'); //Load the model
        $date = date('Y-m-d');
        $stat = "Loggedout";
        $data = array(
            'user' => $user['name'],
            'status' => $stat,
            'date' => $date

        );
        $this->Login_model->create_audit(
            $data['user'],
            $data['status'],
            $data['date']
        );

        $this->session->unset_userdata('user');
        redirect('login');
    }
}
?>