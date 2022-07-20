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
    public function sendemail()
    {
        // echo '<pre>';
        $session = session();
        $model = new UserModel();
        $ID = $this->request->getVar('Email');
        $data = $model->where('Email', $ID)->first();
        if ($data) {
            $token = md5(uniqid());
            $updateData = [
                'forgot_token' => $token,
                'forgot_datetime' => date("Y-m-d H:i:s", strtotime('+15 minute'))
            ];
            $model->update($data['ID'], $updateData);
            $message = '<a href="' . base_url() . '/reset_password/' . $token . '">คลิกที่นี่เพื่อรีเซ็ตรหัสผ่าน</a>';

            $configEmail = \Config\Services::email();

            $email = $configEmail;

            $email->setFrom('624259022@webmail.npru.ac.th', 'รีเซ็ตรหัสผ่าน');


            $email->setTo($ID);

            $email->setSubject('TC_Arena');
            $email->setMessage($message); //your message here


            if ($email->send()) {
                echo 'ส่งอีเมลเรียบร้อยแล้ว โปรดตรวจสอบภายใน15นาที';
            } else {
                print_r($email);
            }
        } else {
            $session->setFlashdata('msg', '*ไม่พบอีเมล์*');
            return redirect()->to('/forgotpassword');
        }
    }



    public function reset_password($token = NULL)
    {
        helper(['form']);
        $model = new UserModel();
        $data = $model->where('forgot_token', $token)
            ->where('forgot_datetime >=', date('Y-m-d H:i:s'))->where('forgot_token is NOT NULL', NULL, FALSE)
            ->first();

        if (isset($data['forgot_token'])) {
            $viewData['user_id'] = $data['ID'];
            $viewData['user_email'] = $data['Email'];

            echo view('/reset_password', $viewData);
        } else {
            $data['validation'] = "ERROR";
            echo view('/forgotpassword', $data);
        }
    }

    public function update_password()
    {
        $session = session();
        $model = new UserModel();
        $ID = $this->request->getVar('id');
        $rules = [
            'password' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'min_length' => 'กรุณากรอกรหัสผ่านอย่างน้อย4ตัว'
                ]
            ],
            'againpassword' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'รหัสผ่านไม่ตรงกัน'
                ]
            ],
        ];
        if ($this->validate($rules)) {
            $data = [
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'forgot_token' => "NULL",
                'forgot_datetime' => "NULL"
            ];
            if ($data) {
                $session->setFlashdata('swel_title', 'แก้ไขรหัสผ่านสำเร็จ');
                // $session->setFlashdata('swel_text', 'โปรดเข้าสู่ระบบก่อนทำรายการ');
                $session->setFlashdata('swel_icon', 'success');
                $session->setFlashdata('swel_button', 'ตกลง');
                $model->update($ID, $data);
                return redirect()->to('/login');
            }
        } else {
            $data['validation'] = $this->validator;
            $data['user_id'] = $ID;
            echo view('/reset_password', $data);
        }
    }
}
