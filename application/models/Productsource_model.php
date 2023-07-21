<?php
class Productsource_model extends CI_model
{

    public function get_productsource()
    {
        $this->db->select('*');
        $this->db->from('tbl_purchase');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_purchase($keyword)
    {
        // Perform a search for users based on the keyword
        $this->db->like('purchase_id', $keyword);
        $this->db->or_like('name', $keyword);
        $this->db->or_like('price', $keyword);
        return $this->db->get('tbl_purchase')->result_array();
    }

    public function create_productsource($data)
    {
        $this->db->insert('tbl_purchase', $data);
    }

    public function update_prods($purchase_id, $name, $price)
    {
        $data = array(
            'name' => $name,
            'price' => $price
        );
        $this->db->where('purchase_id', $purchase_id);
        $this->db->update('tbl_purchase', $data);
    }

    public function delete_prods($purchase_id)
    {
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('tbl_purchase');
    }
}
?>