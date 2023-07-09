<?php
    class Purchase extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Purchase_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['purchases'] = $this->Purchase_model->get_purchase();
                $this->load->view('show_purchase', $data);
            }
            else{
                redirect('login');
            }
        }
        public function add(){
            $this->load->view('product/add_product');
        }
        public function add_prod()
        {
            $datebuy = date('Y-m-d');
            $data = array(
                'buy_id' => $this->input->post('purchase_id'),
                'img' => $this->input->post('img'),
                'name' => $this->input->post('name'),
                'stock' => $this->input->post('stock'),
                'price' => $this->input->post('price'),
                'datebuy' => $datebuy
            );
        
            // Call the model method to add the product
            if ($this->Purchase_model->create_buy($data)) {
                redirect('purchase');
            } else {
                redirect('purchase');
            }
        }

        public function search() {
            $keyword = $this->input->post('keyword');
        
            // Perform the search
            $data['purchases'] = $this->Purchase_model->search_purchase($keyword);
    
            $user = $this->session->userData('user');
            $data['user'] = $user; // Add this line to pass the $user variable to the view
        
            // Load the user list view with the search results
            $this->load->view('show_purchase', $data);
        }

        public function add_purchase()
        {
            // Check if the file upload was successful
            if (!empty($_FILES['img']['name'])) {
                $imageFileName = $_FILES['img']['name'];

                // Configuration for file upload
                $config['upload_path'] = './uploads/'; // Set your upload directory path
                $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Set allowed file types
                $config['max_size'] = 5000; // Set max file size in kilobytes

                $this->load->library('upload', $config);

                // Perform the file upload
                if ($this->upload->do_upload('img')) {
                    // File uploaded successfully, get the uploaded file path
                    $imageFilePath = $config['upload_path'] . $imageFileName;
                } else {
                    // File upload failed, handle the error
                    $uploadError = $this->upload->display_errors();
                    // Redirect or show an error message
                    redirect('dashboard?error=' . urlencode($uploadError));
                    return; // Stop further execution
                }
            } else {
                // No file uploaded, handle the error
                // Redirect or show an error message
                redirect('dashboard?error=' . urlencode('No image file uploaded.'));
                return; // Stop further execution
            }

            // Prepare data to be inserted in the database
            $data = array(
                'img' => $imageFileName,
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                // Save only the file name in the database
            );

            // Call the model method to add the product
            if($this->Purchase_model->create_purchase($data))
            {
                redirect('purchase');
            }
            else{
                redirect('purchase');
            }
        }

    }
?>