<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table = 'statuss';
    protected $primaryKey = 'S_id';
    protected $allowedFields = ['S_id', 'S_name'];
}
