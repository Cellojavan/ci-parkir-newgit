<?php 

class Parkir extends CI_Controller{

    public function __construct(){

        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('parkir_model');
        $this->load->model('petugas_model');
        $this->load->model('lokasi_model');
        $this->load->model('kendaraan_model');
        if($this->session->userdata("hak_akses") == "admin"){
            
        }elseif($this->session->userdata("hak_akses") == "manager"){
            
        }elseif($this->session->userdata("hak_akses") == "petugas"){

        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }

    public function index(){

        $data['judul'] = 'Halaman Parkir';
        $data['parkir'] = $this->parkir_model->getAllParkir();
        $data['nama'] = $this->parkir_model->getByNama();
        $this->load->view('templates/header',$data);
        $this->load->view('parkir/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah(){

        $data['judul'] = "Halaman Tambah Parkir";
        $data['petugas'] = $this->petugas_model->getPetugas();
        $data['lokasi'] = $this->lokasi_model->getAllLokasi();
        $data['kendaraan'] = $this->kendaraan_model->getKendaraan();
        $this->form_validation->set_rules('tglin', 'Tgl In', 'required');
        $this->form_validation->set_rules('tglout', 'Tgl Out', 'required');
        $this->form_validation->set_rules('petugasid', 'Petugas ID', 'required');
        $this->form_validation->set_rules('lokasiid', 'Lokasi ID', 'required');
        $this->form_validation->set_rules('jeniskendaraanid', 'Kendaraan ID', 'required');
        $this->form_validation->set_rules('nopolkendaraan', 'Nopol Kendaraan', 'required');
        $this->form_validation->set_rules('tarif', 'Tarif', 'required|numeric');
      
        if($this->form_validation->run() == FALSE){

            $this->load->view('templates/header2',$data);
            $this->load->view('parkir/tambah',$data);
            $this->load->view('templates/footer2');
       
        }else{

            $query = $this->parkir_model->cekPetugas();
            if($query->num_rows() == 1 ){

                $this->session->set_flashdata('cek', 'Terdaftar');
                redirect(base_url('parkir/tambah'));

            }else{

                $this->parkir_model->tambahParkir();
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect(base_url('parkir'));
            }

        }
    }    

    public function edit($id){

        $data['judul'] = "Halaman Tambah Parkir";
        $data['id'] = ['1', '2'];
        $data['parkir'] = $this->parkir_model->getById($id);
        $data['petugas'] = $this->petugas_model->getPetugas();
        $data['lokasi'] = $this->lokasi_model->getAllLokasi();
        $data['kendaraan'] = $this->kendaraan_model->getKendaraan();
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
        $error = $this->db->error();

        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak dapat dihapus (Sudah Berelasi)');
            redirect(base_url('parkir'));
        }else{
            
            $this->session->set_flashdata("flash", "Dihapus");
            redirect(base_url('parkir'));
        }
    }


    

}

?>