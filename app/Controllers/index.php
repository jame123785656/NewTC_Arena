<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReviewModel;

class index extends Controller
{
    public function index()
    {
        echo view('index');
    }
    public function review()
    {
        helper(['form']);
        $ReviewModel = new ReviewModel();
        $data['review'] = $ReviewModel->join('user','review.r_user = user.ID')->orderBy('r_id', 'Asc')->findAll();
        echo view('review',$data);
    }
}
