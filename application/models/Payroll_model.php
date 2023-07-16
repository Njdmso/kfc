<?php
    class Payroll_model extends CI_model {

        public function get_payroll() {
            $this->db->select('*');
            $this->db->from('tbl_employee');
            $query=$this->db->get();
            return $query->result_array();
        }

        public function search_payroll($keyword) {
            // Perform a search for users based on the keyword
            $this->db->like('employee_id', $keyword);
            $this->db->or_like('name', $keyword);
            $this->db->or_like('role', $keyword);
            $this->db->or_like('datehired', $keyword);
            $this->db->or_like('bankaccount', $keyword);
            return $this->db->get('tbl_employee')->result_array();
        }
    }
?>