<?php
class User_model extends CI_model
{

    public function get_user()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function create_user($name, $role, $username, $password)
    {
        $data = array(
            'name' => $name,
            'role' => $role,
            'username' => $username,
            'password' => $password
        );
        $this->db->insert('tbl_user', $data);
    }

    public function update_user($user_id, $name, $role, $username, $password)
    {
        $data = array(
            'name' => $name,
            'role' => $role,
            'username' => $username,
            'password' => $password
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_user', $data);
    }

    public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_user');
    }

    public function search_user($keyword)
    {
        // Perform a search for users based on the keyword
        $this->db->like('name', $keyword);
        $this->db->or_like('role', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('password', $keyword);
        return $this->db->get('tbl_user')->result_array();
    }
    public function create_audit($audit, $status, $date)
    {
        $data = array(
            'user' => $audit,
            'status' => $status,
            'date' => $date
        );
        $this->db->insert('tbl_audit', $data);
    }
}
?>