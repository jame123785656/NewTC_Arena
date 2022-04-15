<?php

namespace App\Models;

use CodeIgniter\Model;

class TimeModel extends Model
{
    protected $table = 'time';
    protected $primaryKey = 'T_id';
    protected $allowedFields = ['T_id', 'T_start','T_end'];
}
