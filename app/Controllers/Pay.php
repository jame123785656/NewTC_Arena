<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BookingModel;
use App\Models\DetailModel;


class Pay extends Controller {
    public function pay($ID = null) {
        // include helper form
        $db      = \Config\Database::connect();
        $session = session();
        $builder = $db->table('booking');
        $builder->where('B_idUser', $session->get('ID'));
        $builder->selectMax('B_id');
        $test = $builder->get();
        $num = $test->getResult(); 
        // print_r($query[0]);
        $query = $num[0]->B_id;
        $b_id = $query;
        helper(['form']);
        $BookingModel = new BookingModel();
        $DetailModel = new DetailModel();
        $data['booking'] = $BookingModel->join('field','booking.B_idFeld = field.F_ID')->where('B_idUser',$ID)->where('B_status',1)->orderBy('B_id', 'Asc')->findAll();
        $data['detail'] = $DetailModel->join('Time','detail.t_id = time.T_id')->where('d_id',$b_id)->orderBy('d_id', 'Asc')->findAll();
        echo view('pay', $data);
    }
    public function pay_delete($B_id = null) {
        $DetailModel = new DetailModel();
        $BookingModel = new BookingModel();
        $data['detail'] = $DetailModel->where('d_id', $B_id)->delete($B_id);
        $data['booking'] = $BookingModel->where('B_id', $B_id)->delete($B_id);
        return $this->response->redirect(site_url('/bookingpage'));
    }
    public function p_update()
    {
        $db      = \Config\Database::connect();
        $model = new BookingModel();
        $session = session();
        $B_id = $this->request->getVar('B_id');
        $file = $this->request->getFile('B_img');
        $B_img = $file->getRandomName();
        $builder = $db->table('detail');
        $builder->where('d_id',$B_id);
        $hour = $builder->countAllResults();
        $file->move('../public/img_ slip', $B_img);
        $data = [
            'B_img' => $B_img,
            'B_status' => "2",
            'B_hour' => $hour,
            'B_note' => $this->request->getVar('B_note')
        ];
        $model->update($B_id, $data);
        $ID = $session->get('ID');
        return redirect()->to('/userhistory/'.$ID);
    }
}
