<?php

namespace App\Models;

use CodeIgniter\Model;

class authModel extends Model
{
    public function Register($dataUser)
    {
        return $this->db->table('users')->insert([
        'fullname' => $dataUser['inputFullname'],
        'username' => $dataUser['inputUsername'],
        'password' => password_hash($dataUser['inputPassword'], PASSWORD_DEFAULT),
        'role' => $dataUser['inputRole'],
        'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}