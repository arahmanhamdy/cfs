<?php

class Course_model extends CI_Model
{

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_students()
    {
        $this->db->select('student.*,course.name AS course');
        $this->db->from('student');
        $this->db->join('course', 'student.Interest = course.id');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function add($form_data)
    {
        $this->db->insert('course', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    function add_student($form_data)
    {
        $this->db->insert('student', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    function edit($id, $form_data)
    {
        $this->db->where('id', $id);
        $this->db->update('course', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    function delete($id)
    {
        $this->db->delete('course', array('id' => $id));
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }


    public function get_course($id)
    {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('course.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function set_home($id)
    {

        $this->db->update('course', ['is_home' => false]);
        $this->db->where('id', $id);
        $this->db->update('course', ['is_home' => true]);
    }


    public function get_home_course()
    {
        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('is_home', true);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    public function record_count()
    {
        return $this->db->count_all("course");
    }
}