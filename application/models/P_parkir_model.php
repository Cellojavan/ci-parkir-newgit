<?php 

class P_parkir_model extends CI_model{

    public function getAllParkir(){
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");

        return $this->db->get()->result_array();
    }

    public function tambahPengelolaan($tglin,$status,$foto,$nopol,$tarifnew,$jeniskendaraan,$lokasinew){

        $data = [

            "nopol" => $nopol,
            "status" => $status,
            "foto_in" => $foto,
            "tgl_in" => $tglin,
            "tgl_out" => '',
            "foto_out" => '',
            "lokasi_id" => $lokasinew,
            "jenis_kendaraan_id" => $jeniskendaraan,
            "tarif_parkir_id" => $tarifnew

        ];


        $this->db->insert('pengelolaan_parkir', $data);
    }

  

    public function getById($id){

        $this->db->where("id_pengelolaan_parkir", $id);
        return $this->db->get('pengelolaan_parkir')->row_array();
    }
    public function getByName(){
        $id = $this->session->userdata("nama_user");
        $this->db->where("nama_petugas", $id);
        return $this->db->get('petugas')->row_array();
    }
    public function getLokasi($carilokasi){
        $this->db->where("id_lokasi", $carilokasi);
        return $this->db->get('lokasi')->row_array();
    }
    public function getByIdLokasi($lokasi){
        $this->db->where("nama_lokasi", $lokasi);
        return $this->db->get('lokasi')->row_array();
    }
    

    public function UpdateOut($tglout,$status,$foto){

        $data = [

            "tgl_out" => $tglout,
            "status" => $status,
            "foto_out" => $foto,

        ];

        $this->db->where("id_pengelolaan_parkir", $this->input->post("id"));
        $this->db->update("pengelolaan_parkir", $data);
    }

    public function get_keywoard($dari,$ke){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->like("tgl_in",$dari);
        $this->db->or_like("tgl_in",$ke);
        return $this->db->get()->result_array();
    
    }
    public function get_ketik($keywoard){

        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        $this->db->like("nopol",$keywoard);
        return $this->db->get()->result_array();
    
    }

 




        

    
    
}
?>