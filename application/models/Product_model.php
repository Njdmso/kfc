<?php
    class Product_model extends CI_model {

        public function get_product() {
            $this->db->select('*');
            $this->db->from('tbl_product');
            $query=$this->db->get();
            return $query->result_array();
        }

        public function create_product($data){
            $this->db->insert('tbl_product', $data);
        } 

        // public function create_order($name, $role, $username, $password) {
        //     $data = array(
        //         'name' => $name,
        //         'role' => $role,
        //         'username' => $username,
        //         'password' => $password
        //     );
        //     $this->db->insert('tbl_user', $data);
        // }

        // public function update_user($user_id, $name, $role, $username, $password) {
        //     $data = array(
        //         'name' => $name,
        //         'role' => $role,
        //         'username' => $username,
        //         'password' => $password
        //     );
        //     $this->db->where('user_id', $user_id);
        //     $this->db->update('tbl_user', $data);
        // }
    }
?>