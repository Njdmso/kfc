<?php
    class Buy_model extends CI_model {

        public function get_buy() {
            $this->db->select('*');
            $this->db->from('tbl_buys');
            $query=$this->db->get();
            return $query->result_array();
        }

        public function search_buy($keyword) {
            // Perform a search for users based on the keyword
            $this->db->like('buy_id', $keyword);
            $this->db->or_like('name', $keyword);
            $this->db->or_like('datebuy', $keyword);
            return $this->db->get('tbl_buys')->result_array();
        }
    }
?>