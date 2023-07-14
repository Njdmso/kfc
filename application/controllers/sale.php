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

        public function add() {
            $this->load->model('Order_model');
            $dateorder = date('Y-m-d');
            $orderData = $this->input->post('order_data');
            $orders = json_decode($orderData, true); // Convert JSON string to array
          
            foreach ($orders as $order) {
              $data = array(
                'order_id' => $order['productId'],
                'name' => $order['productName'],
                'stock' => $order['quantity'],
                'price' => $order['productPrice'],
                'orderdate' => $dateorder,
                'customer' => $this->input->post('customer'),
                'cashier' => $this->input->post('cashier'),
                'totalprice' => $order['totalPrice'],
              );
          
              $this->Sale_model->create_order(
                $data['order_id'],
                $data['name'],
                $data['stock'],
                $data['price'],
                $data['orderdate'],
                $data['customer'],
                $data['cashier'],
                $data['totalprice']
              );
            }
          
            redirect('sale');
        }

        public function search() {
            $keyword = $this->input->post('keyword');
        
            // Perform the search
            $data['sales'] = $this->Sale_model->search_sale($keyword);
    
            $user = $this->session->userData('user');
            $data['user'] = $user; // Add this line to pass the $user variable to the view
        
            // Load the user list view with the search results
            $this->load->view('show_sale', $data);
        }
          
    }
?>