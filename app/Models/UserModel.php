<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['ID', 'name','username','Email','phone','image','password','status'];

    public function register($data){
        $this->insert($data);
        return TRUE;
    }
}
