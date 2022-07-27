<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'B_id';
    protected $allowedFields = ['B_id','B_idUser','B_idFeld','B_day','B_hour','B_img','B_note','B_status'];

    public function totals($booking_total) {
        $data = $this->db
            ->table('booking')
            ->where("B_status = $booking_total AND (B_day = DATE(NOW()))")
            ->countAllResults();
        return $data;
    }

    public function bookinglist($bookingstatus) {
        $data = $this->db
            ->table('booking')
            ->join('detail','booking.B_id = detail.d_id')
            ->join('time','detail.d_id = time.t_id')
            ->join('statuss','booking.B_status = statuss.S_id')
            ->join('field','booking.B_idFeld = field.F_ID')
            ->join('user','user.ID = booking.B_idUser')
            ->groupBy('B_id')
            // ->where('B_status', $bookstatus)เอาไว้ใช้ตอนเรียกดูข้อมูลการจองสำเร็จทั้งหมดในตาราง
            ->where("B_status = $bookingstatus AND (B_day = DATE(NOW()))")//เรียกดูข้อมูลวันต่อวัน
            ->orderBy('B_id', 'Asc')
            ->get()
            ->getResultArray();
        return $data;
    }
    public function bookingall($bookingstatusall) {
        $data = $this->db
            ->table('booking')
            ->join('detail','booking.B_id = detail.d_id')
            ->join('time','detail.d_id = time.t_id')
            ->join('statuss','booking.B_status = statuss.S_id')
            ->join('field','booking.B_idFeld = field.F_ID')
            ->join('user','user.ID = booking.B_idUser')
            ->groupBy('B_id')
            ->where('B_status', $bookingstatusall)//เอาไว้ใช้ตอนเรียกดูข้อมูลการจองสำเร็จทั้งหมดในตาราง
            // ->where("B_status = $bookingstatusall AND (B_day = DATE(NOW()))")//เรียกดูข้อมูลวันต่อวัน
            ->orderBy('B_id', 'Asc')
            ->get()
            ->getResultArray();
        return $data;
    }

    public function bookinglist_wait($booking_pending) {
        $data = $this->db
            ->table('booking')
            ->where('B_status', $booking_pending)
            ->countAllResults();
        return $data;
    }

    public function ytotal($ystatus) {
        $where = ("B_status = $ystatus AND(B_day = YEAR(NOW()))");;
        $data = $this->db
            ->table('booking')
            ->select('sum(Price * B_hour) as sumprice')
            ->join('field','booking.B_idFeld = field.F_ID')
            ->where($where)
            ->get()
            ->getResultArray();
        return $data;
    }

    public function mtotal($mstatus) {
        $X = date('m');
        $Y = '%-'.$X.'-%';
        $where = ("B_status = $mstatus AND(B_day = YEAR(NOW()))");
        $data = $this->db
            ->table('booking')
            ->select('sum(Price * B_hour) as sumprice')
            ->join('field','booking.B_idFeld = field.F_ID')
            ->where($where)
            ->like('B_day',$Y)
            ->get()
            ->getResultArray();
        return $data;
    }
}