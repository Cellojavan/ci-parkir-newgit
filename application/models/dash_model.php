<?php

class dash_model extends CI_model{

    public function waktu(){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('Y-m-d');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->like("tgl_in",$month);
        return $this->db->get()->num_rows();
    }
    public function inside(){
        date_default_timezone_set("Asia/Jakarta"); 
        $month = date('Y-m-d');
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->like("status","In side");
        return $this->db->get()->num_rows();
    }
    public function Tday(){
        
        $this->db->select("*");
        $this->db->from("pengelolaan_parkir");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = pengelolaan_parkir.jenis_kendaraan_id", "left");
        $this->db->join("lokasi", "lokasi.id_lokasi = pengelolaan_parkir.lokasi_id", "left");
        return $this->db->get()->result_array();
    }
    
    
}

?>