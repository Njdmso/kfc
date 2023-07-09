<?php
    class Buy_model extends CI_model {

        public function get_buy() {
            $this->db->select('*');
            $this->db->from('tbl_buy');
            $query=$this->db->get();
            return $query->result_array();
        }

        public function create_buy($name, $role, $username, $password) {
            $data = array(
                'name' => $name,
                'role' => $role,
                'username' => $username,
                'password' => $password
            );
            $this->db->insert('tbl_buy', $data);
        }

        public function search_user($keyword) {
            // Perform a search for users based on the keyword
            $this->db->like('name', $keyword);
            $this->db->or_like('role', $keyword);
            $this->db->or_like('username', $keyword);
            $this->db->or_like('password', $keyword);
            return $this->db->get('tbl_user')->result_array();
        }
    }
?>