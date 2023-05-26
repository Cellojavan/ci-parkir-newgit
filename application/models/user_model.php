<?php 

class user_model extends CI_model {


    public function getAllUser(){

        return $query = $this->db->get('user')->result_array();;
    }

    public function tambahUser(){

        $data = [

            "nama_user" => $this->input->post("name"),
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password"),
            "email" => $this->input->post("email"),
            "no_wa" => $this->input->post("nohp"),
            "hak_akses" => $this->input->post("hakakses"),
        ];
        $this->db->insert('user', $data);

    }

    public function cekUser(){

        $data = [

            "username" => $this->input->post("username"),
        ];

        $this->db->select("*");
        $this->db->from("user");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();
    }
    public function cekUserr(){

        $data = [

            "username" => $this->input->post("username"),
        ];

        $this->db->select("*");
        $this->db->from("user");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();
    }

    public function getById($id){

        return $this->db->get_where('user', ["id_user" => $id])->row_array();
    }

    public function ubahUser(){

        $data = [

            "nama_user" => $this->input->post("name"),
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password"),
            "email" => $this->input->post("email"),
            "no_wa" => $this->input->post("nohp"),
            "hak_akses" => $this->input->post("hakakses"),
        ];

        $this->db->where('id_user', $this->input->post("id"));
        $this->db->update('user', $data);

    }

    public function getByNama(){

        return $this->db->get_where('user', ["hak_akses" => $this->session->userdata["hak_akses"]])->row_array();
    }
}

?>