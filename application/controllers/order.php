<?php
class Order extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Order_model');
    }

    public function index()
    {
        $user = $this->session->userData('user');
        if ($user) {
            $data['user'] = $user;
            $data['orders'] = $this->Order_model->get_order();
            $this->load->view('show_order', $data);
        } else {
            redirect('login');
        }
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');

        // Perform the search
        $data['orders'] = $this->Order_model->search_order($keyword);

        $user = $this->session->userData('user');
        $data['user'] = $user; // Add this line to pass the $user variable to the view

        // Load the user list view with the search results
        $this->load->view('show_order', $data);
    }


}
?>