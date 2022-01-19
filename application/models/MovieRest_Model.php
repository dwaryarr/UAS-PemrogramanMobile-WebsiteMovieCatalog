<?php

class MovieRest_Model extends CI_model
{
    public function getAllMovie($id = null)
    {
        if($id === null) {
            return $this->db->get('movie')->result_array();
        }else{
            return $this->db->get_where('movie', ['id' => $id])->result_array();
        }
    }

    public function deleteMovie($id)
    {
        $this->db->delete('movie', ['id'=> $id]);
        return $this->db->affected_rows();
    }

    public function createMovie($data)
    {
        $this->db->insert('movie', $data);
        return $this->db->affected_rows();
    }

    public function updateMovie($data, $id)
    {
        $this->db->update('movie', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}