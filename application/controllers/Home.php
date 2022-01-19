<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Movie_model');
        $this->load->library('form_validation');
    }
    public function index($nama = 'Mate')
    {
        $data['judul'] = 'Halaman Home';
        $data['nama'] = $nama;
        $data['movie'] = $this->Movie_model->getAllMovie();
        if ($this->input->post('keyword')) {
            $data['movie'] = $this->Movie_model->cariDataMovie();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
