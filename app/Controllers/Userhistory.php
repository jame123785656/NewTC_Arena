<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\BookingModel;
use App\Models\DetailModel;

class Userhistory extends Controller
{
    public function userhistory($ID = null)
    {
        helper(['form']);
        $BookingModel = new BookingModel();
        $DetailModel = new DetailModel();
        $data['booking'] = $BookingModel->join('field','booking.B_idFeld = field.F_ID')->join('statuss','booking.B_status = statuss.S_id')->where('B_idUser',$ID)->orderBy('B_id', 'Asc')->findAll();
        $data['detail'] = $DetailModel->join('Time','detail.t_id = time.T_id')->orderBy('d_id', 'Asc')->findAll();
        echo view('userhistory',$data);
    }
    public function cancel_booking($B_id) {
        $session = session();
        $model = new BookingModel();
        $data = [
            'B_status' => "7"
        ];
        $model->where('B_id', $B_id)->set($data)->update();
        $ID = $session->get('ID');
        return redirect()->to('/userhistory/'.$ID);
    }
    public function userhistory_delete($B_id) {
        $session = session();
        $DetailModel = new DetailModel();
        $BookingModel = new BookingModel();
        $data['detail'] = $DetailModel->where('d_id', $B_id)->delete($B_id);
        $data['booking'] = $BookingModel->where('B_id', $B_id)->delete($B_id);
        $ID = $session->get('ID');
        return redirect()->to('/userhistory/'.$ID);
    }
}