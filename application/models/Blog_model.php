<?php

class Blog_model extends CI_Model
{

    public function get_all()
    {
        $this->db->select('blog.*,user.username');
        $this->db->from('blog');
        $this->db->join('user', 'user.id = blog.user_id');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_top()
    {
        $this->db->select('id, title, body, image');
        $this->db->from('blog');
        $this->db->where('is_slider', 'top');
        $this->db->order_by("id", "desc");
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_bottom()
    {
        $this->db->select('id, title, body, image, create_date');
        $this->db->from('blog');
        $this->db->where('is_slider', 'bottom');
        $this->db->order_by("id", "desc");
        $this->db->limit(4);
        $query = $this->db->get();
        return $query->result_array();
    }

    function add($form_data)
    {
        $this->db->insert('blog', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    function edit($id, $form_data)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $form_data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    function delete($id)
    {
        $this->db->delete('blog', array('id' => $id));
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    public function get_blog($id)
    {
        $this->db->select('blog.*,user.*');
        $this->db->from('blog');
        $this->db->join('user', 'user.id = blog.user_id');
        $this->db->where('blog.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function edit_slider($id, $form_data)
    {
        $this->db->where('id', $id);
        $this->db->update('blog', $form_data);
    }

    public function record_count()
    {
        return $this->db->count_all("blog");
    }

    public function record_archive_count($year, $month)
    {
        $date = date_parse($month);
        $where = "YEAR(create_date) = ".$year.' and MONTH(create_date) = '.$date['month'];
        $this->db->where($where);
        return $this->db->count_all_results('blog');
    }

    public function fetch_data($limit, $skip)
    {
        $this->db->select('blog.*, user.username, user.user_image');
        $this->db->from('blog');
        $this->db->order_by("create_date", "desc");
        $this->db->join('user', 'user.id = blog.user_id');
        $this->db->limit($limit, ($skip - 1) * $limit);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_archive($limit, $skip, $month, $year)
    {
        $date = date_parse($month);
        $where = "YEAR(create_date) = ".$year.' and MONTH(create_date) = '.$date['month'];
        $this->db->select('blog.*, user.username, user.user_image');
        $this->db->from('blog');
        $this->db->order_by("create_date", "desc");
        $this->db->where($where);
        $this->db->join('user', 'user.id = blog.user_id');
        $this->db->limit($limit, ($skip - 1) * $limit);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_archive(){
        $query = 'SELECT YEAR(create_date) AS year, MONTH(create_date) AS month, COUNT(*) AS total
                  FROM blog
                  GROUP BY YEAR, MONTH
                  ORDER BY create_date desc';
        $result = $this->db->query($query);
        $year = '';
        $archive = array();
        foreach($result->result_array() as $record){
            $record['month'] = date("F", mktime(0, 0, 0, $record['month'], 10));
            if($year != $record['year']){
                $year = $record['year'];
                $archive[$record['year']] = array($record['month']);
            }
            else{
                array_push($archive[$record['year']], $record['month']);
            }
        }
        return $archive;
    }
}