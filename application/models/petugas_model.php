<?php 

class petugas_model extends CI_model{


    public function getPetugas(){

        return $query = $this->db->get('petugas')->result_array();
    }

    public function tambahPetugas(){

        $data = [

            "lokasi_id" => $this->input->post("lokasiid"),
            "nama_petugas" => $this->input->post("namapetugas"),

        ];

        $this->db->insert('petugas', $data);
    }

    public function getById($id){

        return $this->db->get_where('petugas', ['id_petugas' => $id])->row_array();

    }
}

?>