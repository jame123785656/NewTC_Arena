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
        $bookingModel = new BookingModel();
        $data['books'] = $bookingModel->bookinglist();
        $DetailModel = new DetailModel();
        $data['detail'] = $DetailModel->join('Time','detail.t_id = time.T_id')->orderBy('d_id', 'Asc')->findAll();
        echo view('report_admin', $data);
    }

    // public function pass() {
    //     $model = new passModel();
    //     if($this->request->getGet('q')){
    //         $q = $this->request->getGet('q');
    //          $data['users'] = $model->like('booking', $q)->getAll();
    //     }else {
    //         $data['users'] = $model->getAll();
    //     }
    //     return view('report_admin, $data');
    //     }

    public function Search() {
        $this->db->select("*");  
        $this->db->like('booking',$this->input->get('search'));
        $query = $this->db->get("booking"); 
        return $query->result();
     }
}