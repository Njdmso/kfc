<?php
class Analytics_model extends CI_model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_dsales()
    {
        $this->db->select('orderdate, SUM(totalprice) as dailysales');
        $this->db->group_by('orderdate');
        $query = $this->db->get('tbl_order');
        return $query->result();
    }

    public function get_msales()
    {
        $query = $this->db->query("SELECT DATE_FORMAT(orderdate, '%M') as month, SUM(totalprice) as sales FROM tbl_order GROUP BY DATE_FORMAT(orderdate, '%M') ORDER BY MIN(orderdate)");
        return $query->result();
    }
}
?>