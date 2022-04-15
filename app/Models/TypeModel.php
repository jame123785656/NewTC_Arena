<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeModel extends Model
{
    protected $table = 'type';
    protected $primaryKey = 'T_id';
    protected $allowedFields = ['T_id','T_name'];
}
