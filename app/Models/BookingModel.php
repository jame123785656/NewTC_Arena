<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'B_id';
    protected $allowedFields = ['B_id','B_idUser','B_idFeld','B_day','B_img','B_status'];

    public function totals() {
        $data = $this->db
            ->table('booking')
            ->where('B_status', 3)
            ->countAllResults();
        return $data;
    }

    public function bookinglist() {
        $data = $this->db
            ->table('booking')
            ->join('detail','booking.B_id = detail.d_id')
            ->join('time','detail.d_id = time.t_id')
            ->join('statuss','booking.B_status = statuss.S_id')
            ->join('field','booking.B_idFeld = field.F_ID')
            ->join('user','user.ID = booking.B_idUser')
            ->groupBy('B_id')
            ->where('B_status', 3)
            ->orderBy('B_id', 'Asc')
            ->get()
            ->getResultArray();
        return $data;
    }
}