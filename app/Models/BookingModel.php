<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'B_id';
    protected $allowedFields = ['B_id','B_idUser','B_idFeld','B_day','B_img','B_status'];
}
