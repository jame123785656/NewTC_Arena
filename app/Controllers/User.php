<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class User extends Controller {
    public function User() {
        echo view('user');
    }
      // --------------------------> แสดงโปรไฟล์
    public function profile() {
        // include helper form
        helper(['form']);
        $data = [];
        echo view('profile', $data);
    }

    // --------------------------> แก้ไขโปรไฟล์
    public function edit($ID = null)
    {
        $UserModel = new UserModel;
        $session = session();
        $data['user'] = $UserModel->where('ID',$ID)->first();
        echo view('editprofile', $data);
    }
    public function editprofile()
    {
        $model = new UserModel();
        $session = session();
        $ID = $this->request->getVar('id');
        $file = $this->request->getFile('image');
        if($_FILES['image']['name'] !=""){
        $image = $file->getRandomName();
        $file->move('../public/img', $image);
        }else{
            $image = $this->request->getVar('old_image');;
        }
        $data = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'phone' => $this->request->getVar('phone'),
            'Email' => $this->request->getVar('Email'),
            'image' => $image,
        ];
        $model->update($ID, $data);
        $session->set($data);
        return redirect()->to('/profile');
    }
}