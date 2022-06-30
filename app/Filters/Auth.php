<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface {
    public function before(RequestInterface $request, $arguments = null) {
        // if user not logged in
        if (!session()->get('logged_in')) {
            $session = session();
            $session->setFlashdata('swel_title', 'กรุณาเข้าสู่ระบบก่อน');
            $session->setFlashdata('swel_icon', 'error');
            $session->setFlashdata('swel_button', 'ตกลง');
            return redirect()->to('/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // Do something 
    }
}