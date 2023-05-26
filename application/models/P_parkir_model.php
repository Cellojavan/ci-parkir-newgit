<?php 

class P_parkir_model extends CI_model{

    public function getAllParkir(){

        return $this->db->get('pengelolaan_parkir')->result_array();
    }

    public function tambahPengelolaan($tglin,$status,$foto,$nopol){

        $data = [

            "nopol" => $nopol,
            "status" => $status,
            "foto_in" => $foto,
            "tgl_in" => $tglin,
            "tgl_out" => '',
            "foto_out" => '',

        ];


        $this->db->insert('pengelolaan_parkir', $data);
    }

    public function getByNama(){

        return $this->db->get_where('user', ["username" => $this->input->post['username']])->row_array();
    }
}
?>