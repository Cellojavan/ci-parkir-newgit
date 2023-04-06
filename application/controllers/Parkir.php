<?php 

class Parkir extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('parkir_model');
    }

    public function index(){

        $data['judul'] = 'Halaman Parkir';
        $data['parkir'] = $this->parkir_model->getAllParkir();
        $this->load->view('templates/header',$data);
        $this->load->view('parkir/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah(){

        $data['judul'] = "Halaman Tambah Parkir";
        $this->form_validation->set_rules('tglin', 'Tgl In', 'required');
        $this->form_validation->set_rules('tglout', 'Tgl Out', 'required');
        $this->form_validation->set_rules('petugasid', 'Petugas ID', 'required|numeric');
        $this->form_validation->set_rules('lokasiid', 'Lokasi ID', 'required|numeric');
        $this->form_validation->set_rules('jeniskendaraanid', 'Kendaraan ID', 'required|numeric');
        $this->form_validation->set_rules('nopolkendaraan', 'Nopol Kendaraan', 'required');
        $this->form_validation->set_rules('tarif', 'Tarif', 'required|numeric');
      
        if($this->form_validation->run() == FALSE){

            $this->load->view('templates/header2',$data);
            $this->load->view('parkir/tambah');
            $this->load->view('templates/footer2');
       
        }else{

            $this->parkir_model->tambahParkir();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('parkir'));
        }
    }    

    public function edit($id){

        $data['judul'] = "Halaman Tambah Parkir";
        $data['parkir'] = $this->parkir_model->getById($id);

        $this->form_validation->set_rules('tglin', 'Tgl In', 'required');
        $this->form_validation->set_rules('tglout', 'Tgl Out', 'required');
        $this->form_validation->set_rules('petugasid', 'Petugas ID', 'required|numeric');
        $this->form_validation->set_rules('lokasiid', 'Lokasi ID', 'required|numeric');
        $this->form_validation->set_rules('jeniskendaraanid', 'Kendaraan ID', 'required|numeric');
        $this->form_validation->set_rules('nopolkendaraan', 'Nopol Kendaraan', 'required');
        $this->form_validation->set_rules('tarif', 'Tarif', 'required|numeric');
          
        if($this->form_validation->run() == FALSE){
    
            $this->load->view('templates/header2',$data);
            $this->load->view('parkir/edit');
            $this->load->view('templates/footer2');
           
        }else{
    
            $this->parkir_model->editParkir();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(base_url('parkir'));
        }
    }

    public function hapus($id){

        $this->db->where('id_parkir', $id);
        $this->db->delete('parkir');

        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('parkir'));
    }


    

}

?>