<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;


class Manageuser extends Controller
{
    public function manageuser()
    {
        $UserModel = new UserModel();
        $data['user'] = $UserModel->orderby('ID','ASC')->findAll();
        echo view('manageuser',$data);
    }
   
    
}
