<?php 

class parkir_model extends CI_model{


    public function getAllParkir(){

        return $query = $this->db->get("parkir")->result_array();
    }

    public function tambahParkir(){

        $data = [

            "tgl_in" => $this->input->post("tglin"),
            "tgl_out" => $this->input->post("tglout"),
            "petugas_id" => $this->input->post("petugasid"),
            "lokasi_id" => $this->input->post("lokasiid"),
            "jenis_kendaraan_id" => $this->input->post("jeniskendaraanid"),
            "nopol_kendaraan" => $this->input->post("nopolkendaraan"),
            "tarif" => $this->input->post("tarif"),

        ];

        $this->db->insert("parkir", $data);
    }
}

?>