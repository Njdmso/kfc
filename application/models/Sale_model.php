<?php
    class Sale_model extends CI_model {

        public function get_sale() {
            $this->db->select('*');
            $this->db->from('tbl_sale');
            $query=$this->db->get();
            return $query->result_array();
        }
    }
?>