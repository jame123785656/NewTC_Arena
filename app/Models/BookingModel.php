<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'B_id';
    protected $allowedFields = ['B_id','B_idUser','B_idFeld','B_day','B_hour','B_img','B_status'];

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

    public function bookinglist_wait() {
        $data = $this->db
            ->table('booking')
            ->where('B_status', 2)
            ->countAllResults();
        return $data;
    }

    public function ytotal() {
        $toyear = date('Y');
        $date = $toyear."-01-01";
        $where = "B_status = 3 AND B_day >= '$date'";
        $data = $this->db
            ->table('booking')
            ->select('sum(Price * B_hour) as sumprice')
            ->join('field','booking.B_idFeld = field.F_ID')
            ->where($where)
            ->get()
            ->getResultArray();
        return $data;
    }

    public function mtotal() {
        $month = date("m");
        $m = $month - 0;
        if($m == 0) {
            $m = "12";
          } else if($m <= 9) {
            $m = "0".$m;
          }
        $date = date("Y")."-".$m."-01";
        $where = "B_status = 3 AND B_day >= '$date'";
        $data = $this->db
            ->table('booking')
            ->select('sum(Price * B_hour) as sumprice')
            ->join('field','booking.B_idFeld = field.F_ID')
            ->where($where)
            ->get()
            ->getResultArray();
        return $data;
    }
}