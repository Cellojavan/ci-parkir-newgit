<?php 

class P_parkir extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->model('P_parkir_model');
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

        $data['nama'] = $this->P_parkir_model->getByNama();
        $data['parkir'] = $this->P_parkir_model->GetAllParkir();
        $data['judul'] = 'Pengelolaan Parkir';
        $this->load->view('templates/header',$data);
        $this->load->view('P_parkir/index',$data);
        $this->load->view('templates/footer',$data);

    }

    public function tambah(){

        $data['judul'] = 'Tambah Pengelolaan';
        $this->form_validation->set_rules('tglin', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('nopol', 'Nopol', 'required');
        if($this->form_validation->run() == FALSE){

            $this->load->view('P_parkir/tambah',$data);

        }else{

            $tglin = $this->input->post('tglin');
            $fotoin = $_POST['xnama_file_foto'];
            $tglout = $this->input->post('tglout');
            $nopol = $this->input->post('nopol');
            $status = 'In side';
            $foto = 'foto_'.$nopol.'_'.$tglin .'.jpeg';
            $this->P_parkir_model->tambahPengelolaan($tglin,$status,$foto,$nopol);
           
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
                    $this->session->set_flashdata('flash','Ditambahkan');
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

}
?>