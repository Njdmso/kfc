<?php
class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Login_model'); // Load the authentication model
    $this->load->library('session');
  }

  public function index() {
    $this->load->view('show_login');
  }

  public function authenticate() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->Login_model->get_user($username, $password);

    if ($user) {
      $userData = array (
        'user_id' => $user->user_id,
        'name' => $user->name,
        'role' => $user->role,
        'username' => $user->username,
        'password' => $user->password,
      );
      $this->session->set_userdata('user', $userData);
      redirect('dashboard');
    } else {
      $data['error'] = 'Invalid username or password';
      echo '<script>alert("' . $data['error'] . '");</script>';
      $this->load->view('show_login');
    }
  }
}
?>
