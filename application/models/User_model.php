<?php

class User_model extends CI_Model
{

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function add($form_data)
    {
        $this->db->insert('user', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    function edit($id, $form_data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('user', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    function delete($id)
    {
        $this->db->delete('user', array('id' => $id));
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }


    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function login($form_data)
    {
        $this -> db -> select('id, username, password');
        $this -> db -> from('user');
        $this -> db -> where('username', $form_data['username']);
        $this -> db -> where('password', $form_data['password']);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    public function record_count()
    {
        return $this->db->count_all("user");
    }
}