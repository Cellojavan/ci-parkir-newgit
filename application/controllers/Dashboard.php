<?php 

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("dash_model");
        $this->load->library('form_validation');
    }

    public function index(){
        $data['judul'] = "Dashboard Admin";
        $data['waktu'] = $this->dash_model->waktu();
        $data['side'] = $this->dash_model->inside(); 
        $data['bulanan'] = $this->dash_model->bulanan(); 
        $data['duit'] = $this->dash_model->bulanann(); 
        $data['tday'] = $this->dash_model->Tday(); 
        $this->load->view('templates/header',$data);
        $this->load->view('dashboard/index',$data);
        $this->load->view('templates/footer');
    }
}

?>