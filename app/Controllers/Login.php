<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller {
    public function login() {
        // include helper form
        helper(['form']);
        echo view('login');
    }

    public function auth() {
        $session = session();
        $model = new UserModel();
        $ID = $this->request->getVar('Email');
        $password = $this->request->getVar('password');
        $data = $model->where('Email', $ID)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_password = password_verify($password, $pass);
            if ($verify_password) {
                $ses_data = [
                    'ID' => $data['ID'],
                    'Email' => $data['Email'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'phone' => $data['phone'],
                    'image' => $data['image'],
                    'password'=> $data['password'],
                    'status'=> $data['status'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                if($data['status']==='member'){
                return redirect()->to('/user');
                }
                else if($data['status']==='admin'){
                    return redirect()->to('/report_admin');
                }
            } else {
                $session->setFlashdata('msg', '*รหัสผ่านไม่ถูกต้อง*');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', '*ไม่พบอีเมล์*');
            return redirect()->to('/login');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}