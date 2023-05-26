<?php 

class parkir_model extends CI_model{


    public function getAllParkir(){

        $this->db->select("*");
        $this->db->from("parkir");
        $this->db->join("lokasi", "lokasi.id_lokasi = parkir.lokasi_id", "left");
        $this->db->join("petugas", "petugas.id_petugas = parkir.petugas_id", "left");
        $this->db->join("jenis_kendaraan", "jenis_kendaraan.id_jenis_kendaraan = parkir.jenis_kendaraan_id", "left");
        return $this->db->get()->result_array();
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
    public function cekPetugas(){

        $data = [

            "petugas_id" => $this->input->post("petugasid"),
        ];

        $this->db->select("*");
        $this->db->from("parkir");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();
    }

    public function getById($id){

        $this->db->where("id_parkir", $id);
        return $this->db->get('parkir')->row_array();
    }

    public function editParkir(){

        $data = [

            "tgl_in" => $this->input->post("tglin"),
            "tgl_out" => $this->input->post("tglout"),
            "petugas_id" => $this->input->post("petugasid"),
            "lokasi_id" => $this->input->post("lokasiid"),
            "jenis_kendaraan_id" => $this->input->post("jeniskendaraanid"),
            "nopol_kendaraan" => $this->input->post("nopolkendaraan"),
            "tarif" => $this->input->post("tarif"),

        ];

        $this->db->where("id_parkir", $this->input->post("id"));
        $this->db->update("parkir", $data);
    }
    public function getByNama(){

        return $this->db->get_where('user', ["hak_akses" => $this->session->userdata["hak_akses"]])->row_array();
    }

}

?>