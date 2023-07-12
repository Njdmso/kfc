<?php
    class Sale_model extends CI_model {

        public function get_sale() {
            $this->db->select('*');
            $this->db->from('tbl_sale');
            $query=$this->db->get();
            return $query->result_array();
        }

        public function create_order($order_id, $name, $stock, $price, $orderdate, $customer, $cashier) {
            $data = array(
                'order_id' => $order_id,
                'name' => $name,
                'stock' => $stock,
                'price' => $price,
                'orderdate' => $orderdate,
                'customer' => $customer,
                'cashier' => $cashier,
            );
            $this->db->insert('tbl_order', $data);
        }
    }
?>