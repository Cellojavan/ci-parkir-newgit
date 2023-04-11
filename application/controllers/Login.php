<?php 

class Login extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->model("login_model");
    }

    public function index(){

        $data['judul'] = "Halaman Login";
        $this->load->view("templates/hlogin",$data);
        $this->load->view("login/index");
        $this->load->view("templates/flogin");
    }

    public function login(){

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $login = $this->login_model->cekSession($username,$password);
        
        if($login->num_rows() == 1){
            foreach($login->result_array() as $row){
                $data =[
                    "hak_akses" => $row["hak_akses"]
                ];
                $this->session->set_userdata($data);
                if($this->session->userdata("hak_akses") == "admin"){
                    $this->session->set_flashdata('login', 'login sebagai');
                    redirect(base_url());
                }
                elseif($this->session->userdata("hak_akses") == "manager"){
                    $this->session->set_flashdata('login', 'login sebagai');
                    redirect(base_url('kendaraan'));
                }
                elseif($this->session->userdata("hak_akses") == "petugas"){
                    $this->session->set_flashdata('login', 'login sebagai');
                    redirect(base_url('parkir'));
                }

            }
        }elseif($username == '' && $password == ''){
            $this->session->set_flashdata('flash', 'Data tidak boleh kosong');
            redirect(base_url('login'));

        }else{

            $this->session->set_flashdata('flash','User tidak ditemukan');
            redirect(base_url('login'));
        }
    }

    public function logout(){

        $this->session->unset_userdata("hak_akses");
        redirect(base_url('login'));
    }
}

?>