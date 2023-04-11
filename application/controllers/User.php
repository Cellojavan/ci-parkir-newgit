<?php 

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->session->userdata("hak_akses");
        if($this->session->userdata("hak_akses") == "admin"){
            
        }else{
            $this->session->set_flashdata('flash', 'anda tidak memiliki akses');
            redirect(base_url('login'));
        }
    }
   
    public function index(){

        $data['judul'] = 'Halaman User';
        $data['user'] = $this->user_model->getAllUser();
        $data['nama'] = $this->user_model->getByNama();
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');

    }

    public function tambah(){

        $data['judul'] = 'Halaman Tambah';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'NoHp', 'required|numeric');
        $this->form_validation->set_rules('hakakses', 'HakAkses', 'required');

        if($this->form_validation->run() == FALSE){
            
            $this->load->view('templates/header2', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('templates/footer2');
        
        }else{

            $this->user_model->tambahUser();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url());
        }

    }

    public function edit($id){

        $data['judul'] = 'Halaman edit';
        $data['user'] = $this->user_model->getById($id);
        $data['akses'] = ['admin', 'petugas', 'manager'];
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nohp', 'NoHp', 'required|numeric');
        $this->form_validation->set_rules('hakakses', 'HakAkses', 'required');

        if($this->form_validation->run() == FALSE){
            
            $this->load->view('templates/header2', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer2');
        
        }else{

            $this->user_model->ubahUser();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect(base_url());
        }

    }

    public function hapus($id){

        $this->db->where('id_user', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url());
    }


}


?>