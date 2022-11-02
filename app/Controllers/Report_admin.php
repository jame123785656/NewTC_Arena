<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BookingModel;
use App\Models\DetailModel;

class report_admin extends Controller
{
    public function Report_admin()
    {
        $model_booking = new BookingModel();
        $data['book_total'] = $model_booking->totals(3);
        $data_ptotal = $model_booking->ytotal(3);
        foreach ($data_ptotal as $v) {
            $data['book_price'] = $v['sumprice'];
        }
        $data_mtotal = $model_booking->mtotal(3);
        foreach ($data_mtotal as $v) {
            $sumprice_y = $v['sumprice'];
            if ($sumprice_y == 0 || $sumprice_y == null) {
                $data['book_month'] = "0";
            } else {
                $data['book_month'] = $sumprice_y;
            }
        }
        $data['books'] = $model_booking->bookinglist(3);
        $data['books_wait'] = $model_booking->bookinglist_wait(2,7);
        $DetailModel = new DetailModel();
        $data['detail'] = $DetailModel->join('Time', 'detail.t_id = time.T_id')->orderBy('d_id', 'Asc')->findAll();
        echo view('report_admin', $data);
    }
    //------ฟังก์ชั่นหน้าจองสำเร็จทั้งหมด------//
    public function Report_All()
    {
        $model_booking = new BookingModel();
        $data['booking'] = $model_booking->bookingall(3);
        $data['book_total'] = $model_booking->totalall(3);
        $DetailModel = new DetailModel();
        $data['detail'] = $DetailModel->join('Time', 'detail.t_id = time.T_id')->orderBy('d_id', 'Asc')->findAll();
        echo view('report_all',$data);
    }
}
