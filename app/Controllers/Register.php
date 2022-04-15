<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Register extends Controller
{
    public function register()
    {
        // include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }
    public function save()
    {
        // include helper form
        helper(['form']);
        // set rules validation form
        $rules = [
            'phone' => [
                'rules' => 'required|min_length[9]|max_length[10]',
                'errors' => [
                    'min_length' => 'กรุณากรอกเบอร์โทรให้ครบถ้วน',
                    'max_length' => 'กรุณากรอกเบอร์โทรให้ถูกต้อง'
                ]
            ],
            'Email' => [
                'rules' => 'required|valid_Email|is_unique[user.Email]',
                'errors' => [
                    'is_unique' => 'อีเมล์นี้ถูกใช้แล้ว'
                ]
            ],
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
            $model = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'Email' => $this->request->getVar('Email'),
                'phone' => $this->request->getVar('phone'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status' => "member",
                'image' => "sadsadsadsada.jpg"
            ];
            if ($data) {
                $insert = $model->register($data);
                return redirect()->to('/login');
            }
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}
