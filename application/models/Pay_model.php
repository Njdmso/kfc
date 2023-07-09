<?php
    class Pay_model extends CI_model {

        public function get_pay() {
            $this->db->select('*');
            $this->db->from('tbl_pay');
            $query=$this->db->get();
            return $query->result_array();
        }

        public function update_pay($pay_id, $status) {
            $data = array(
                'pay_id' => $pay_id,
                'status' => $status,
            );
            $this->db->where('pay_id', $pay_id);
            $this->db->update('tbl_pay', $data);
        }

        public function delete_pay($pay_id)
        {
            $this->db->where('pay_id', $pay_id);
            $this->db->delete('tbl_pay');
        }

        public function search_pay($keyword) {
            // Perform a search for users based on the keyword
            $this->db->or_like('pay_id', $keyword);
            $this->db->or_like('name', $keyword);
            $this->db->or_like('price', $keyword);
            return $this->db->get('tbl_pay')->result_array();
        }
    }
?>