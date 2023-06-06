<?php 

class petugas_model extends CI_model{


    public function getPetugas(){

        $this->db->select("*");
        $this->db->from("petugas");
        $this->db->join("lokasi", "lokasi.id_lokasi = petugas.lokasi_id", "left");
        return $this->db->get()->result_array();
    }
    public function tampilPetugas(){
        $keywoard = 'petugas';
        $this->db->select("*");
        $this->db->from("user");
        $this->db->like("hak_akses",$keywoard);
        return $this->db->get()->result_array();
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

    public function editPetugas(){

        $data = [

            "lokasi_id" => $this->input->post('lokasiid'),
            "nama_petugas" => $this->input->post('namapetugas'),
        ];

        $this->db->where('id_petugas', $this->input->post('id'));
        $this->db->update('petugas', $data);

    }


}

?>