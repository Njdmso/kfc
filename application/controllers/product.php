<?php
    class Product extends CI_controller {

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
            $this->load->model('Product_model');
        }

        public function index() {
            $user = $this->session->userData('user');
            if($user){
                $data['user'] = $user;
                $data['products'] = $this->Product_model->get_product();
                $this->load->view('show_product', $data);
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
        'stock' => $this->input->post('stock')
         // Save only the file name in the database
    );

    // Call the model method to add the product
    if($this->Product_model->create_product($data))
    {
        redirect('product');
    }
    else{
        redirect('product?error');
    }


    // Redirect to the product listing page or show a success message
    
}
    }
?>