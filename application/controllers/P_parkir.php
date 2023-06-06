<?php 

class P_parkir extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('P_parkir_model');
        $this->load->model('kendaraan_model');
        $this->load->model('lokasi_model');

        $this->load->library('form_validation');
        if($this->session->userdata("hak_akses") == "admin"){
            
        }elseif($this->session->userdata("hak_akses") == "manager"){
            
        }elseif($this->session->userdata("hak_akses") == "petugas"){

        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }

    public function index(){

        $data['parkir'] = $this->P_parkir_model->GetAllParkir();
        $data['judul'] = 'Pengelolaan Parkir';
        $dari = $this->input->post('dari');
        $keywoard = $this->input->post('keyword');
        $ke = $this->input->post('ke');
        
        
        if($this->input->post('submit')){
            $data['parkir'] = $this->P_parkir_model->get_ketik($keywoard);
            $this->load->view('templates/header',$data);
            $this->load->view('P_parkir/index',$data);
            $this->load->view('templates/footer',$data);
            
        }else{
            
            if($this->input->post('cari')){

                $data['parkir'] = $this->P_parkir_model->get_keywoard($ke,$dari);
                $this->load->view('templates/header',$data);
                $this->load->view('P_parkir/index',$data);
                $this->load->view('templates/footer',$data);

            }else{
                $this->load->view('templates/header',$data);
                $this->load->view('P_parkir/index',$data);
                $this->load->view('templates/footer',$data);
            }
            

        }

    }


    public function tambah(){

        $data['kendaraan'] = $this->kendaraan_model->getKendaraan();
        $idlokasi = $this->P_parkir_model->getByName();
        $carilokasi = $idlokasi['lokasi_id'];
        $data['lokasi'] = $this->P_parkir_model->getLokasi($carilokasi);
        $data['judul'] = 'Foto Masuk';
        $this->form_validation->set_rules('tglin', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('nopol',  'Nopol', 'required'); 
        if($this->form_validation->run() == FALSE){

            $this->load->view('P_parkir/tambah',$data);

        }else{

            $tglin = $this->input->post('tglin');
            $fotoin = $_POST['xnama_file_foto'];
            $nopol = $this->input->post('nopol');
            $tarifparkir = $this->input->post('tarif');
            $jeniskendaraan = $this->input->post('nim');
            $lokasi = $this->input->post('lokasiid');
            $kembalikan_id = $this->P_parkir_model->getByIdLokasi($lokasi);
            $lokasinew = $kembalikan_id['id_lokasi'];
            $status = 'In side';
            $foto = 'foto_'.$nopol.'_'.$tglin .'.jpeg';
            
            $this->db->where("tarif_parkir",$tarifparkir);
            $parkir = $this->db->get('jenis_kendaraan')->row_array();
            $tarifnew = $parkir['id_jenis_kendaraan'];
            $this->P_parkir_model->tambahPengelolaan($tglin,$status,$foto,$nopol,$tarifnew,$jeniskendaraan,$lokasinew);
           
            if(!empty($fotoin)){
				if($foto !=="") {
					if(file_exists('./dist/img/fotomasuk/'.$foto)){
						unlink('./dist/img/fotomasuk/'.$foto);
					}
					$data = $fotoin;
					list($type, $data) = explode(';', $data);
					list(, $data)      = explode(',', $data);
					$data = base64_decode($data);
					file_put_contents('./dist/img/fotomasuk/'.$foto, $data);
                    $this->session->set_flashdata('flashh','Masuk');
                    redirect(base_url('P_parkir'));
				}
				else{
					$data = $fotoin;
					list($type, $data) = explode(';', $data);
					list(, $data)      = explode(',', $data);
					$data = base64_decode($data);
					file_put_contents('./dist/img/fotomasuk/'.$foto, $data);
				}

			}

        }
    }

    public function keluar($id){

        $data['judul'] = 'Foto Keluar';
        $data['parkir'] = $this->P_parkir_model->getById($id);
        $this->form_validation->set_rules('tglout', 'Tanggal Out', 'required');
        if($this->form_validation->run() == FALSE){

            $this->load->view('P_parkir/keluar',$data);
        
        }else{

            $tglout = $this->input->post('tglout');
            $fotoout = $_POST['xxnama_file_foto'];
            $nopol = $parkir['nopol'];
            $status = 'Done';
            $foto = 'foto_'.$nopol.'_'.$tglout .'.jpeg';
            $this->P_parkir_model->UpdateOut($tglout,$status,$foto);
           
            if(!empty($fotoout)){
				if($foto !=="") {
					if(file_exists('./dist/img/fotoout/'.$foto)){
						unlink('./dist/img/fotoout/'.$foto);
					}
					$data = $fotoout;
					list($type, $data) = explode(';', $data);
					list(, $data)      = explode(',', $data);
					$data = base64_decode($data);
					file_put_contents('./dist/img/fotoout/'.$foto, $data);
                    $this->session->set_flashdata('flashh','Masuk');
                    redirect(base_url('P_parkir'));
				}
				else{
					$data = $fotoout;
					list($type, $data) = explode(';', $data);
					list(, $data)      = explode(',', $data);
					$data = base64_decode($data);
					file_put_contents('./dist/img/fotoout/'.$foto, $data);
				}

			}
        }

    }
    public function hapus($id){

        $this->db->where('id_pengelolaan_parkir', $id);
        $this->db->delete('pengelolaan_parkir');
        $error = $this->db->error();

        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak dapat dihapus (Sudah Berelasi)');
            redirect(base_url('parkir'));
        }else{
            
            $this->session->set_flashdata("flash", "Dihapus");
            redirect(base_url('P_Parkir'));
        }
    }

    public function autofill(){

        $id	= $this->input->get('nim');
        $this->db->where("id_jenis_kendaraan",$id);
        $parkir = $this->db->get('jenis_kendaraan')->row_array();
        $data = array(
            'tarif' => $parkir['tarif_parkir'],
        );
        echo json_encode($data);
        

	}
    

    

}
?>