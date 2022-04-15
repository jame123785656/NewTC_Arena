<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'r_id';
    protected $allowedFields = ['r_id', 'r_name','r_user','r_image'];
}
