<?php

namespace App\Controllers;
use App\Models\UserModel;
class BarangController extends BaseController
{
    
    public function index()
    {
        
        if($this->session->get('username')){
                $active_date = null;
                // $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Barang';
                        $data['nav_url'] = 'Barang';

                    $data['content_scripts'][] = '/js/barang/index.js';
                    $data['barang'] = $this->barang->selectall();
                    
                    // $data['kategory'] = "makanan";

                    //  var_dump($data['produk']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/index', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function createview()
    {
        if($this->session->get('username')){
               

                        $data['title'] = 'Barang';
                        $data['nav_url'] = 'Barang';

                    $data['content_scripts'][] = '/js/barang/create.js';
                    
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/created', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function editview($id)
    {
        if($this->session->get('username')){
               

                        $data['title'] = 'Barang';
                        $data['nav_url'] = 'Barang';

                    $data['content_scripts'][] = '/js/barang/edit.js';
                    $data['barang'] = $this->barang->selectwhere($id);
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/edit', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }

    public function createsave()
    {       
        if(!$this->validate([
            'name' => [
                'rules'=>'required|is_unique[tbl_barang.namabrg]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada di database',
                ]
            ],
            'kode' => [
                'rules'=>'required|is_unique[tbl_barang.kodebrg]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada di database',
                ]
            ],
            'hargabeli' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'satuan' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'stok' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
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
                    'errorhargabeli' => $validation->getError('hargabeli'),
                    'errorsatuan' => $validation->getError('satuan'),
                    'errorstok' => $validation->getError('stok'),
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'namabrg' => $this->request->getVar('name'),
            'kodebrg' => $this->request->getVar('kode'),
            'hargabeli' => $this->request->getVar('hargabeli'),
            'satuan' => $this->request->getVar('satuan'),
        );
        $data2 = array(
            'kodebrg' => $this->request->getVar('kode'),
            'stok' => $this->request->getVar('stok'),
        );

        $insert = $this->barang->insertData($data);
        $insert2 = $this->stok->insertData($data2);
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
    'hargabeli' => [
        'rules'=>'required|numeric',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
            'numeric' => '{field} harus nomor',
        ]
    ],
    'satuan' => [
        'rules'=>'required|numeric',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
            'numeric' => '{field} harus nomor',
        ]
    ],
    'stok' => [
        'rules'=>'required|numeric',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
            'numeric' => '{field} harus nomor',
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
                    'errorhargabeli' => $validation->getError('hargabeli'),
                    'errorsatuan' => $validation->getError('satuan'),
                    'errorstok' => $validation->getError('stok'),
                ]
                ];
            return json_encode($msg);
    }
    else{
        $id = $this->request->getVar('id');
        $id2 = $this->request->getVar('kode');
        $data = array(
            'namabrg' => $this->request->getVar('name'),
            'kodebrg' => $this->request->getVar('kode'),
            'hargabeli' => $this->request->getVar('hargabeli'),
            'satuan' => $this->request->getVar('satuan'),
        );
        $data2 = array(
            'stok' => $this->request->getVar('stok'),
        );

       $update = $this->barang->updateData($id, $data);
       $update2 = $this->stok->UpdateData($id, $data2);
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
        $kodebrg = $this->barang->selectWhereid($id);
        var_dump($kodebrg);
        $delete = $this->barang->deleteData($id);
        $deletestok = $this->stok->deleteData($kodebrg[0]["kodebrg"]);
        return json_encode($delete);
    }
    public function autofill(){
        $kode=$this->request->getVar('kodebrg');
        $data = $this->barang->autofill($kode);
         return json_encode($data);
    }


}