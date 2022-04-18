<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FieldModel;
use App\Models\BookingModel;
use App\Models\DetailModel;
use App\Models\TimeModel;
class Bookingpage extends Controller {
    public function bookingpage() {
        // include helper form
        helper(['form']);
        // $model = new BookingModel();
        $FieldModel = new FieldModel();
        // $TimeModel = new TimeModel();
        $data['field'] = $FieldModel->join('type','field.type = type.T_id')->join('promotion','field.Promotion = promotion.p_id' )->orderBy('F_ID', 'Asc')->findAll();

        // $databooking_count = $model->countTimeBooking();
        // if ($databooking_count >= 1) {
        //     $databooking = $model->getTimeBooking();
        //     foreach ($databooking as $value) {
        //         $times = $value['T_id'];
        //         $data['time'] = $TimeModel->checkTime($times);
        //     }
        // } else {
        //     $data['time'] = $TimeModel->orderBy('T_id', 'Asc')->findAll(); //บรรทัดเก่า
        // }

        echo view('bookingpage', $data);
    }
    public function booking(){
        $model = new BookingModel();
        $model02 = new DetailModel();
        $session = session();
        $data = [
            'B_day' => $this->request->getVar('B_day'),
            'B_idUser'=>$session->get('ID'),
            'B_idFeld' => $this->request->getVar('F_ID'),
            'B_img' => "",
            'B_status' => "1"
        ];
        $model->insert($data);
        
        $db      = \Config\Database::connect();
        $builder = $db->table('booking');
        $builder->where('B_idUser', $session->get('ID'));
        $builder->selectMax('B_id');
        $test = $builder->get();
        $num = $test->getResult(); 
        // print_r($query[0]);
        $query = $num[0]->B_id;
        if(!$query){
            $db      = \Config\Database::connect();
            $builder = $db->table('booking');
            $builder->selectMax('B_id');
            $test = $builder->get();
            $num = $test->getResult(); 
            // print_r($query[0]);
            $query = $num[0]->B_id;
        }
        $T1 = $this->request->getVar('time1');
        if($T1){
            $data02 = [
                'd_id' => $query,
                't_id' => $T1
            ];
            $model02->insert($data02);
      
        }
        $T2 = $this->request->getVar('time2');
        if($T2){
            $data02 = [
                'd_id' => $query,
                't_id' => $T2
            ];
            $model02->insert($data02);
      
        }
        $T3 = $this->request->getVar('time3');
        if($T3){
            $data02 = [
                'd_id' => $query,
                't_id' => $T3
            ];
            $model02->insert($data02);
      
        }
        $T4 = $this->request->getVar('time4');
        if($T4){
            $data02 = [
                'd_id' => $query,
                't_id' => $T4
            ];
            $model02->insert($data02);
      
        }
        $T5 = $this->request->getVar('time5');
        if($T5){
            $data02 = [
                'd_id' => $query,
                't_id' => $T5
            ];
            $model02->insert($data02);
      
        }
        $T6 = $this->request->getVar('time6');
        if($T6){
            $data02 = [
                'd_id' => $query,
                't_id' => $T6
            ];
            $model02->insert($data02);
      
        }
        $T7 = $this->request->getVar('time7');
        if($T7){
            $data02 = [
                'd_id' => $query,
                't_id' => $T7
            ];
            $model02->insert($data02);
      
        }
           $ID = $session->get('ID');
          return redirect()->to('/pay/'.$ID);
    }
    public function select_Field(){
        $session = session();
        $Field =['F_ID'=>$this->request->getVar('F_ID')];
        $session->set($Field);
    }
}