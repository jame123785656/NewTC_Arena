<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BookingModel;
use App\Models\DetailModel;


class pay_admin extends Controller {
    
    public function Pay_admin() {
   
        helper(['form']);
        $BookingModel = new BookingModel();
        $DetailModel = new DetailModel();
        $sql = "B_status IN (2,7)";
        $data['booking'] = $BookingModel->join('field','booking.B_idFeld = field.F_ID')->join('statuss','booking.B_status = statuss.S_id')->
        join('user','booking.B_idUser = user.ID')->where("$sql  AND (B_day = DATE(NOW()))")->orderBy('B_id', 'Asc')->findAll();
        $data['detail'] = $DetailModel->join('Time','detail.t_id = time.T_id')->orderBy('d_id', 'Asc')->findAll();
        echo view('pay_admin',$data);
    }
    public function Payadmin_All()
    {
        helper(['form']);
        $BookingModel = new BookingModel();
        $DetailModel = new DetailModel();
        $sql = "B_status IN (2,7)";
        $data['booking'] = $BookingModel->join('field','booking.B_idFeld = field.F_ID')->join('statuss','booking.B_status = statuss.S_id')->
        join('user','booking.B_idUser = user.ID')->where($sql)->orderBy('B_id', 'Asc')->findAll();
        $data['detail'] = $DetailModel->join('Time','detail.t_id = time.T_id')->orderBy('d_id', 'Asc')->findAll();
        echo view('payadmin_all',$data);
    }
    public function update_pay($B_id) {
        $model = new BookingModel();
        $data = [
            'B_status' => "3"
        ];
        $model->where('B_id', $B_id)->set($data)->update();
        return redirect()->to('/pay_admin');
    }
    public function cancel_pay($B_id) {
        $model = new BookingModel();
        $data = [
            'B_status' => "4"
        ];
        $model->where('B_id', $B_id)->set($data)->update();
        return redirect()->to('/pay_admin');
    }
    public function Cancel_reservation($B_id) {
        $model = new BookingModel();
        $data = [
            'B_status' => "8"
        ];
        $model->where('B_id', $B_id)->set($data)->update();
        return redirect()->to('/pay_admin');
    }
}
