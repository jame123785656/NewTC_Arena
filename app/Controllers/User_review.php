<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReviewModel;

class User_review extends Controller
{
    public function user_review()
    {
        helper(['form']);
        $ReviewModel = new ReviewModel();
        $data['review'] = $ReviewModel->join('user','review.r_user = user.ID')->orderBy('r_id', 'Asc')->findAll();
        echo view('user_review',$data);
    }
    public function insert(){
        $model = new ReviewModel();
        $session = session();
        $file = $this->request->getFile('r_image');
        if($_FILES['r_image']['name'] !=""){
            $r_image = $file->getRandomName();
            $file->move('../public/img', $r_image);
            }else{
                $r_image = "";
            }
    $data = [
        'r_name' => $this->request->getVar('r_name'),
        'r_user'=>$session->get('ID'),
        'r_image' => $r_image,
    ];
    $model->insert($data);
    return redirect()->to('/user_review');

    }
}
