<?php

namespace App\Controllers;
use App\Models\UserModel;
class SuplierController extends BaseController
{
    
    public function index()
    {
        
        if($this->session->get('username')){
                $active_date = null;
                // $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Suplier';
                        $data['nav_url'] = 'Suplier';

                    $data['content_scripts'][] = '/js/suplier/index.js';
                    $data['suplier'] = $this->suplier->selectall();
                    
                    // $data['kategory'] = "makanan";

                    //  var_dump($data['produk']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Suplier/index', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function createview()
    {
        
        if($this->session->get('username')){
               

                        $data['title'] = 'Suplier';
                        $data['nav_url'] = 'Suplier';

                    $data['content_scripts'][] = '/js/suplier/create.js';
                    
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Suplier/created', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function editview($id)
    {
        
        if($this->session->get('username')){
               

                        $data['title'] = 'Suplier';
                        $data['nav_url'] = 'Suplier';

                    $data['content_scripts'][] = '/js/suplier/edit.js';
                    $data['suplier'] = $this->suplier->selectwhere($id);
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('suplier/edit', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }

    public function createsave()
    {       
        if(!$this->validate([
            'name' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'kode' => [
                'rules'=>'required|is_unique[tbl_suplier.kodespl]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada di database',
                ]
            ],
        ])){
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorname' => $validation->getError('name'),
                    'errorkode' => $validation->getError('kode'),
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'namaspl' => $this->request->getVar('name'),
            'kodespl' => $this->request->getVar('kode'),
        );

        $insert = $this->suplier->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/barang'
            ]
            ];
        return json_encode($msg);}
    }
    public function editsave()
    {
    if(!$this->validate(['name' => [
        'rules'=>'required',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
        ]
    ],
    'kode' => [
        'rules'=>'required',
        'errors'=>[
            'required' => '{field} harus dipilih',
        ]
    ],
  
    ])){
        $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorname' => $validation->getError('name'),
                    'errorkode' => $validation->getError('kode')
                ]
                ];
            return json_encode($msg);
    }
    else{
        $id = $this->request->getVar('id');
        $data = array(
            'namaspl' => $this->request->getVar('name'),
            'kodespl' => $this->request->getVar('kode'),
        );

       $update = $this->suplier->updateData($id, $data);
       $msg = [
        'sukses' =>[
            'url' => '/barang'
        ]
        ];
    return json_encode($msg);}
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $delete = $this->suplier->deleteData($id);
        return json_encode($delete);
    }



}