<?php 

class Petugas extends CI_Controller{
    public function __construct(){

        parent::__construct();
    
        $this->load->model('petugas_model');
        $this->load->library('form_validation');
    }



    public function index(){

        $data['judul'] = 'Data Petugas';
        $data['petugas'] = $this->petugas_model->getPetugas();
        $this->load->view('templates/header',$data);
        $this->load->view('petugas/index',$data);
        $this->load->view('templates/footer');

    }

    public function tambah(){

        $data['judul'] = "Tambah Data Petugas";
        $this->form_validation->set_rules('namapetugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('lokasiid', 'Lokasi Id', 'required|numeric');
        if($this->form_validation->run() == FALSE){

            $this->load->view('templates/header2',$data);
            $this->load->view('petugas/tambah',$data);
            $this->load->view('templates/footer2');
        
        }else{

            $this->petugas_model->tambahPetugas();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('petugas'));

        }
    }

    public function edit($id){

        $data['judul'] = "Edit Petugas";
        $data['petugas'] = $this->petugas_model->getById($id);
        $this->form_validation->set_rules('namapetugas', 'Nama Petugas', 'required');
        $this->form_validation->set_rules('lokasiid', 'Lokasi Id', 'required|numeric');
        if($this->form_validation->run() == FALSE ){
              
            $this->load->view('templates/header2',$data);
            $this->load->view('petugas/edit',$data);
            $this->load->view('templates/footer2');

        }else{

            $this->petugas_model->editPetugas();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(bae_url('petugas'));
        }
    }
}

?>