<?php

class login_model extends CI_model{


    public function cekSession($username,$password){

        $data = [

            "username" => $username,
            "password" => $password,
        ];

        $this->db->select("*");
        $this->db->from("user");
        $this->db->where($data);
        $this->db->limit("1");
        return $this->db->get();

    }
}


?>