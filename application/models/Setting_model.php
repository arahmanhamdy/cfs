<?php

class Setting_model extends CI_Model
{

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('setting');
        $query = $this->db->get();

        return $query->result_array();
    }

    function edit($form_data)
    {
        $this->db->update('setting', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }
}