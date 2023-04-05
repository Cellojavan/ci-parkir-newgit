<?php 

class lokasi_model extends CI_model{


    public function getAllLokasi(){

       return $query = $this->db->get('lokasi')->result_array();
    }

    public function tambahLokasi(){

        $data = [
            "nama_lokasi" => $this->input->post("namelokasi"),
        ];
    
        $this->db->insert('lokasi', $data);
    
    }

    public function getById($id){

        return $this->db->get_where('lokasi', ["id_lokasi" => $id])->row_array();
    }

    public function editLokasi(){

        $data=[

            "nama_lokasi" => $this->input->post("namelokasi"),
        ];

        $this->db->where("id_lokasi" , $this->input->post("id"));
        $this->db->update("lokasi", $data);
    }

}

?>