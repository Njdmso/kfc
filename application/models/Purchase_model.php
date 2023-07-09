<?php
    class Purchase_model extends CI_model {

        public function get_purchase() {
            $this->db->select('*');
            $this->db->from('tbl_purchase');
            $query=$this->db->get();
            return $query->result_array();
        }

        public function create_buy($data){
            $this->db->insert('tbl_buy', $data);
        }

        public function search_purchase($keyword) {
            // Perform a search for users based on the keyword
            $this->db->or_like('purchase_id', $keyword);
            $this->db->or_like('name', $keyword);
            $this->db->or_like('price', $keyword);
            return $this->db->get('tbl_purchase')->result_array();
        }

        public function create_purchase($data){
            $this->db->insert('tbl_purchase', $data);
        }
    }
?>