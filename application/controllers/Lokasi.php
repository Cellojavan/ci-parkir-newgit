<?php 

class Lokasi extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('lokasi_model');
    }

    public function index(){

        $data['judul'] = "Halaman Lokasi";
        $data['lokasi'] = $this->lokasi_model->getAllLokasi();
        $this->load->view('templates/header',$data);
        $this->load->view('lokasi/index',$data);
        $this->load->view('templates/footer');

    }

    public function tambah(){

        $data['judul'] = "Halaman tambah";
        $this->form_validation->set_rules('namelokasi', 'Nama Lokasi', 'required');
        if($this->form_validation->run() == FALSE ){

            $this->load->view('templates/header2',$data);
            $this->load->view('lokasi/tambah');
            $this->load->view('templates/footer2');
        }else{

            $this->lokasi_model->tambahLokasi();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('lokasi'));
        }
    }

    public function edit($id){

        $data['judul'] = "Halaman Edit";
        $data['lokasi'] = $this->lokasi_model->getById($id);
        $this->form_validation->set_rules('namelokasi', 'Nama Lokasi', 'required');
        if ($this->form_validation->run()== FALSE){

            $this->load->view('templates/header2',$data);
            $this->load->view('lokasi/edit',$data);
            $this->load->view('templates/footer2');
        }else{

            $this->lokasi_model->editLokasi();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(base_url('lokasi'));
        }
    }

    public function hapus($id){

        $this->db->where("id_lokasi", $id);
        $this->db->delete('lokasi');

        $this->session->set_flashdata("flash", "Dihapus");
        redirect(base_url('lokasi'));
    }

}

?>