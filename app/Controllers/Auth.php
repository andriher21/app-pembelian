<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\RoleModel;
class Auth extends BaseController
{  
    public function index()
    {
        if ($this->session->get('username')) {
           return redirect()->to('/barang');
        }
        
        $this->validation->setRule('username', 'Username', 'trim|required');
        $this->validation->setRule('password', 'Password', 'trim|required');

        // if ($this->validation->run() == false) {

            $data['title'] = 'Regio | Login';
            return view('templates/auth_header', $data)
                . view('Auth/login')
                . view('templates/auth_footer');
        // } 
        // else {

        //     // validasi suskses
        //     $this->_login();
        // }
    }
    public function login()
    {   
        $login =[
        'username' => 'admin',
        'password' => md5($this->request->getVar('password'))];
        // $user = $usermodel->where($login)->first();
        // var_dump($user);    
        if ($login != null) {
            $data = [
                'username' => $login['username'],

            ];
            $this->session->set($data);
            // var_dump($role);
            return redirect()->to('/barang');
             
            echo "Berhasil Login";
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">
					Wrong Username and Password!</div>');
                    return redirect()->to('/');
            echo "gagal login";
        }
    }

    public function logout()
    {
        unset($_SESSION['username'],);
        $this->session->setFlashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            &nbsp;&nbsp;&nbsp;&nbsp;Logged Out.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
       return  redirect()->to('/');
    }
}
