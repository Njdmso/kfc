<?php
class Productsource extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Productsource_model');
    }

    public function index()
    {
        $user = $this->session->userData('user');
        if ($user) {
            $data['user'] = $user;
            $data['productsources'] = $this->Productsource_model->get_productsource();
            $this->load->view('show_productsource', $data);
        } else {
            redirect('login');
        }
    }
    public function add()
    {
        $this->load->view('product/add_product');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');

        // Perform the search
        $data['productsources'] = $this->Productsource_model->search_purchase($keyword);

        $user = $this->session->userData('user');
        $data['user'] = $user; // Add this line to pass the $user variable to the view

        // Load the user list view with the search results
        $this->load->view('show_productsource', $data);
    }

    public function add_productsource()
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
        if ($this->Productsource_model->create_productsource($data)) {
            redirect('productsource');
        } else {

            $user = $this->session->userData('user');
        
            $this->load->model('User_model'); //Load the model
            $date = date('Y-m-d');
            $stat = "Add Productsource";
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
            
            redirect('productsource');
        }
    }

    public function update() {
        $this->load->model('Productsource_model'); //Load the user_model
        $edit = "";
        $data = array(
            $edit = $this->input->post('purchase_id'),
            'purchase_id' => $this->input->post('purchase_id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
        );
        $this->Productsource_model->update_prods(
            $data['purchase_id'],
            $data['name'],
            $data['price']
        );


        $user = $this->session->userData('user');
        
            $this->load->model('User_model'); //Load the model
            $date = date('Y-m-d');
            $stat = "Edit Productsource id " . $edit;
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

        redirect('productsource');
    }

    public function delete($purchase_id)
        {
            $this->Productsource_model->delete_prods($purchase_id);

            $user = $this->session->userData('user');
        
            $this->load->model('User_model'); //Load the model
            $date = date('Y-m-d');
            $stat = "Delete Productsource id " . $purchase_id;
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

            redirect('productsource');
        }

}
?>