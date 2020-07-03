<?php
class Comments_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getComments()
    {
        $query = $this->db->select('*')->from('comments')->order_by('date', 'DESC')->get();
        return $query->result_array();
    }

    public function setComments()
    {
        $nickname = '';
        $this->load->helper('url');
        $this->load->helper('date');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        if (!$this->input->post('nickname')){
            $nickname = stristr($this->input->post('email'), '@', true);
        } else {
            $nickname = $this->input->post('nickname');
        }

        $data = array(
            'nickname' => $nickname,
            'email' => $this->input->post('email'),
            'date' => time(),
            'slug' => $slug,
            'content' => $this->input->post('content')
        );

        return $this->db->insert('comments', $data);
    }

    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->select('*')->from('comments')->order_by('date', 'DESC')->get();


        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    public function get_total()
    {
        return $this->db->count_all("comments");
    }

}
