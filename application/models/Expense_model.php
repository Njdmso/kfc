<?php
class Expense_model extends CI_model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_dsales()
    {
        $this->db->select('datebuy, SUM(totalexp) as dailysales');
        $this->db->group_by('datebuy');
        $query = $this->db->get('tbl_buy');
        return $query->result();
    }

    public function get_msales()
    {
        $query = $this->db->query("SELECT DATE_FORMAT(datebuy, '%M') as month, SUM(totalexp) as sales FROM tbl_buy GROUP BY DATE_FORMAT(datebuy, '%M') ORDER BY MIN(datebuy)");
        return $query->result();
    }
}
?>