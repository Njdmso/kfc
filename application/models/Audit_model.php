<?php
class Audit_model extends CI_model
{

    public function get_audit()
    {
        $this->db->select('*');
        $this->db->from('tbl_audit');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>