<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Movie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Movie_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Movie List';
        $data['movie'] = $this->Movie_model->getAllMovie();
        if ($this->input->post('keyword')) {
            $data['movie'] = $this->Movie_model->cariDataMovie();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('movie/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Movie';

        $this->form_validation->set_rules('gambar', 'Gambar');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('movie/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Movie_model->tambahDataMovie();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('movie');
        }
    }

    public function hapus($id)
    {
        $this->Movie_model->hapusDataMovie($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('movie');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data movie';
        $data['movie'] = $this->Movie_model->getMovieById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('movie/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Movie';
        $data['movie'] = $this->Movie_model->getMovieById($id);
        $data['genre'] = ['Action', 'Adventure', 'Animation', 'Comedy', 'Drama', 'Horror'];

        $this->form_validation->set_rules('gambar', 'Gambar');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('movie/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Movie_model->ubahDataMovie();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('movie');
        }
    }
}
