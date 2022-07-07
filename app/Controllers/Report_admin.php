<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\BookingModel;
use App\Models\DetailModel;

class report_admin extends Controller {
    public function Report_admin() {
        $data = [];
        $model_user = new UserModel();
        $data['count_id'] = $model_user->total();
        $model_booking = new BookingModel();
        $data['book_total'] = $model_booking->totals();
        $data_ptotal = $model_booking->ytotal();
        foreach($data_ptotal as $v){
            $data['book_price'] = $v['sumprice'];
        }
        $data_mtotal = $model_booking->mtotal();
        foreach($data_mtotal as $v){
            $sumprice_y = $v['sumprice'];
            if($sumprice_y == 0 || $sumprice_y == null) {
                $data['book_month'] = "0";
            }else {
                $data['book_month'] = $sumprice_y;
            }
        }
        $data['books'] = $model_booking->bookinglist();
        $data['books_wait'] = $model_booking->bookinglist_wait();
        $DetailModel = new DetailModel();
        $data['detail'] = $DetailModel->join('Time','detail.t_id = time.T_id')->orderBy('d_id', 'Asc')->findAll();
        echo view('report_admin', $data);
    }


}