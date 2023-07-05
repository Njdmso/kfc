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

        public function search_product($keyword) {
            // Perform a search for users based on the keyword
            $this->db->or_like('product_id', $keyword);
            $this->db->or_like('name', $keyword);
            return $this->db->get('tbl_product')->result_array();
        }
    }
?>