<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $table = 'detail';
    protected $primaryKey = 'd_id';
    protected $allowedFields = ['d_id','t_id'];
}
