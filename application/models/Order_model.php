<?php
    class Order_model extends CI_model {

        public function get_order() {
            $this->db->select('*');
            $this->db->from('tbl_order');
            $query=$this->db->get();
            return $query->result_array();
        }

        public function search_order($keyword) {
            // Perform a search for users based on the keyword
            $this->db->or_like('order_id', $keyword);
            $this->db->or_like('name', $keyword);
            $this->db->or_like('price', $keyword);
            $this->db->or_like('cashier', $keyword);
            $this->db->or_like('orderdate', $keyword);
            return $this->db->get('tbl_order')->result_array();
        }
    }
?>