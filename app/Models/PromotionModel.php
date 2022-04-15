<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model
{
    protected $table = 'promotion';
    protected $primaryKey = 'p_id';
    protected $allowedFields = ['p_id', 'p_name'];
}
