<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Forgotpassword extends Controller
{
    public function forgotpassword()
    {
        helper(['form']);
        echo view('forgotpassword');
    }
    public function sendemail() {
         // echo '<pre>';
        $session = session();
        $model = new UserModel();
        $ID = $this->request->getVar('Email');
        $data = $model->where('Email', $ID)->first();
        if ($data) {
                $ses_data = [
                    'ID' => $data['ID'],
                    'Email' => $data['Email'],
                ];
                $session->set($ses_data);
                if($data){
                // return redirect()->to('/newpassword');
                $message = '<a href="'. base_url().'/login/reset_password/">คลิกที่นี่เพื่อรีเซ็ตรหัสผ่าน</a><br><br>';
    
                $configEmail = \Config\Services::email(); 
               
                
                $email = $configEmail;
            
                $email->setFrom('624259022@webmail.npru.ac.th', 'รีเซ็ตรหัสผ่าน');
            
            
                $email->setTo('624259022@webmail.npru.ac.th');
            
                $email->setSubject('ลืมรหัสผ่าน');
                $email->setMessage($message);//your message here
            
            
                if ($email->send()) {
                    echo 'Email successfully sent, please checks.';
                    
                } else {
                    $data = $email->printDebugger(['headers']);
                    print_r($data);
                }
            
                $email->printDebugger(['headers']);
            
                }
        } else {
            $session->setFlashdata('msg', '*ไม่พบอีเมล์*');
            return redirect()->to('/forgotpassword');
        }
    }
  
}
    