<?php 

class Kendaraan extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $this->load->model("kendaraan_model");
        $this->load->library("form_validation");
    
    }

    public function index(){

        $data['judul'] = "Halaman Kendaraan";
        $data['kendaraan'] = $this->kendaraan_model->getKendaraan();
        $this->load->view("templates/header",$data);
        $this->load->view("kendaraan/index",$data);
        $this->load->view("templates/footer");
    }

    public function tambah(){

        $data['judul'] = "Halaman Tambah Kendaraan";
        $this->form_validation->set_rules('lokasiid','Lokasi ID', 'required|numeric');
        $this->form_validation->set_rules('jeniskendaraan',' Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('tarif',' Tarif Parkir', 'required|numeric');
        if($this->form_validation->run() == FALSE){

            $this->load->view("templates/header2",$data);
            $this->load->view("kendaraan/tambah",$data);
            $this->load->view("templates/footer2");
        
        }else{

            $this->kendaraan_model->tambahKendaraan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('kendaraan'));
        }
    }

    public function edit($id){

        $data['judul'] = "Halaman Ubah";
        $data['kendaraan'] = $this->kendaraan_model->GetById($id);
        $this->form_validation->set_rules('lokasiid','Lokasi ID', 'required|numeric');
        $this->form_validation->set_rules('jeniskendaraan',' Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('tarif',' Tarif Parkir', 'required|numeric');
        if($this->form_validation->run() == FALSE){

            $this->load->view("templates/header2",$data);
            $this->load->view("kendaraan/edit",$data);
            $this->load->view("templates/footer2");
        
        }else{

            $this->kendaraan_model->editKendaraan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(base_url('kendaraan'));
        }
    }

    public function delete($id){

        $this->db->where('id_jenis_kendaraan', $id);
        $this->db->delete("jenis_kendaraan");
        $this->session->set_flashdata('flash', "Didelete");
        redirect(base_url('kendaraan'));
    }
}

?>