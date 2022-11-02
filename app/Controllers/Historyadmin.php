<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\BookingModel;
use App\Models\DetailModel;
use App\Models\UserModel;



class Historyadmin extends Controller
{
    public function historyadmin($ID = null)
    {
        helper(['form']);
        $BookingModel = new BookingModel();
        $DetailModel = new DetailModel();
        $UserModel = new UserModel();
        $data['user'] = $UserModel->where('ID',$ID)->first();
        $data['booking'] = $BookingModel->join('field','booking.B_idFeld = field.F_ID')->join('statuss','booking.B_status = statuss.S_id')->join('user','booking.B_idUser = user.ID')->where('B_idUser',$ID)->orderBy('B_id', 'Asc')->findAll();
        $data['detail'] = $DetailModel->join('Time','detail.t_id = time.T_id')->orderBy('d_id', 'Asc')->findAll();
        echo view('historyadmin',$data);
    }

}