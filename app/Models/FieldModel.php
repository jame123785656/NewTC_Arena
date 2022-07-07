<?php

namespace App\Models;

use CodeIgniter\Model;

class FieldModel extends Model
{
    protected $table = 'field';
    protected $primaryKey = 'F_ID';
    protected $allowedFields = ['F_ID', 'Name','Price','person','Promotion','f_image','Type','f_status'];
}
