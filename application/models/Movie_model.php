<?php

class Movie_model extends CI_model
{
    public function getAllMovie()
    {
        return $this->db->get('movie')->result_array();
        
    }

    public function tambahDataMovie()
    {
        $data = [
            "gambar" => $this->input->post('gambar', true),
            "nama" => $this->input->post('nama', true),
            "tahun" => $this->input->post('tahun', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "genre" => $this->input->post('genre', true)
        ];

        $this->db->insert('movie', $data);
    }

    public function hapusDataMovie($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('movie', ['id' => $id]);
    }

    public function getMovieById($id)
    {
        return $this->db->get_where('movie', ['id' => $id])->row_array();
    }

    public function ubahDataMovie()
    {
        $data = [
            "gambar" => $this->input->post('gambar', true),
            "nama" => $this->input->post('nama', true),
            "tahun" => $this->input->post('tahun', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            "genre" => $this->input->post('genre', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('movie', $data);
    }

    public function cariDataMovie()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('genre', $keyword);
        $this->db->or_like('tahun', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        return $this->db->get('movie')->result_array();
    }

    public function getMovie($id = null)
    {
        if ($id === null){
            return $this->db->get('movie')->result_array();
        }else {
            return $this->db->get_where('movie', ['id' => $id])->result_array();
        }       
    }
}
