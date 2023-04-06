<?php 

class kendaraan_model extends CI_model{

    public function getKendaraan(){

        return $query = $this->db->get("jenis_kendaraan")->result_array();
    }

    public function tambahKendaraan(){

        $data = [
            "lokasi_id" => $this->input->post("lokasiid"),
            "jenis_kendaraan" => $this->input->post("jeniskendaraan"),
            "tarif_parkir" => $this->input->post("tarif"),
        ];

        $this->db->insert("jenis_kendaraan", $data);
    }

    public function getById($id){

        return $this->db->get_where("jenis_kendaraan", ["id_jenis_kendaraan" => $id])->row_array();
    }

    public function editKendaraan(){

        $data = [
            "lokasi_id" => $this->input->post("lokasiid"),
            "jenis_kendaraan" => $this->input->post("jeniskendaraan"),
            "tarif_parkir" => $this->input->post("tarif"),
        ];

        $this->db->where("id_jenis_kendaraan", $this->input->post("id"));
        $this->db->update("jenis_kendaraan", $data);
    }
}

?>