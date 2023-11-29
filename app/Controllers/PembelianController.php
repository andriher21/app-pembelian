<?php

namespace App\Controllers;
use App\Models\UserModel;
class PembelianController extends BaseController
{
    
    public function index()
    {
        
        if($this->session->get('username')){
                $active_date = null;
                // $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Pembelian';
                        $data['nav_url'] = 'Pembelian';

                    $data['content_scripts'][] = '/js/pembelian/index.js';
                    $data['pembelian'] = $this->headerbeli->selectall();
                    
                    // $data['kategory'] = "makanan";

                    //  var_dump($data['produk']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Pembelian/index', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function createview()
    {
        if($this->session->get('username')){
               

                        $data['title'] = 'Pembelian';
                        $data['nav_url'] = 'Pembelian';

                    $data['content_scripts'][] = '/js/pembelian/create.js';
                    $data['barang'] = $this->barang->selectall();
                    $data['suplier'] = $this->suplier->selectall();
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Pembelian/created', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    
    public function detailview($id)
    {
        if($this->session->get('username')){
               

                        $data['title'] = 'Pembelian';
                        $data['nav_url'] = 'Pembelian';

                    $data['content_scripts'][] = '/js/pembelian/edit.js';
                    $data['beli'] = $this->headerbeli->selectwherejoin($id);
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Pembelian/detail', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function editview($id)
    {
        if($this->session->get('username')){
               

                        $data['title'] = 'Pembelian';
                        $data['nav_url'] = 'Pembelian';

                    $data['content_scripts'][] = '/js/pembelian/edit.js';
                    $data['beli'] = $this->headerbeli->selectwherejoin($id);
                    $data['barang'] = $this->barang->selectall();
                    $data['suplier'] = $this->suplier->selectall();
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Pembelian/edit', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }

    public function createsave()
    {       
        if(!$this->validate([
            'kodebrg' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'kodespl' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'hargabeli' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'qty' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'diskon' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'diskonrp' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'totalrp' => [
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
                    'errorkodebrg' => $validation->getError('kodebrg'),
                    'errorkodespl' => $validation->getError('kodespl'),
                    'errorhargabeli' => $validation->getError('hargabeli'),
                    'errorqty' => $validation->getError('qty'),
                    'errordiskon' => $validation->getError('diskon'),
                    'errordiskonrp' => $validation->getError('diskonrp'),
                    'errortotalrp' => $validation->getError('totalrp'),
                ]
                ];
            return json_encode($msg);
        }
        else{
            $kodemax = $this->headerbeli->selectmax();
            // var_dump($kodemax);
            if($kodemax[0]['kodemax'] == null){
                $urutan = 1;
            }
            else{
                $urutan =(int) substr($kodemax[0]['kodemax'], 7,3);
                $urutan++;
            }
            
            $kodebeli ='B'.date('Ym').sprintf("%03s",$urutan);
            $data = array(
                'notransaksi' => $kodebeli,
                'kodespl' => $this->request->getVar('kodespl'),
                'tglbeli'=>date('Y-m-d H:i:s')
            );
            $data2 = array(
                'notransaksi' => $kodebeli,
                'kodebrg' => $this->request->getVar('kodebrg'),
                'hargabeli' => $this->request->getVar('hargabeli'),
                'qty' => $this->request->getVar('qty'),
                'diskon' => $this->request->getVar('diskon'),
                'diskonrp' => $this->request->getVar('diskonrp'),
                'totalrp' => $this->request->getVar('totalrp'),
            );
            $data3 = array(
                'notransaksi' => $kodebeli,
                'kodespl' => $this->request->getVar('kodespl'),
                'tglbeli'=>date('Y-m-d H:i:s'),
                'totalhutang'=> $this->request->getVar('totalrp') - $this->request->getVar('diskonrp')
            );
            $stok = $this->stok->selectwhere($this->request->getVar('kodebrg'));
            $data4 = array(
                'qty'=>$stok[0]['qtybeli']-$this->request->getVar('qty')
            );

            $header = $this->headerbeli->insertData($data);
            $detail = $this->detailbeli->insertData($data2);
            $hutang = $this->hutang->insertData($data3);
            $stokupdate = $this->stok->updateData($this->request->getVar('kodebrg'),$data4);
            $msg = [
                'sukses' =>[
                    'url' => '/pembelian'
                ]
                ];
            return json_encode($msg);}
    }
    public function editsave()
    {
        if(!$this->validate([
            'kodebrg' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'kodebrg' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'kodespl' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'hargabeli' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'qty' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'diskon' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'diskonrp' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'totalrp' => [
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
                    'errorkodebrg' => $validation->getError('kodebrg'),
                    'errorkodespl' => $validation->getError('kodespl'),
                    'errorhargabeli' => $validation->getError('hargabeli'),
                    'errorqty' => $validation->getError('qty'),
                    'errordiskon' => $validation->getError('diskon'),
                    'errordiskonrp' => $validation->getError('diskonrp'),
                    'errortotalrp' => $validation->getError('totalrp'),
                ]
                ];
            return json_encode($msg);
        }
        else{
            $notransaksi = $this->request->getVar('notransaksi');
            $data = array(
                'kodespl' => $this->request->getVar('kodespl'),
                'tglbeli'=>date('Y-m-d H:i:s')
            );
            $data2 = array(
                'kodebrg' => $this->request->getVar('kodebrg'),
                'hargabeli' => $this->request->getVar('hargabeli'),
                'qty' => $this->request->getVar('qty'),
                'diskon' => $this->request->getVar('diskon'),
                'diskonrp' => $this->request->getVar('diskonrp'),
                'totalrp' => $this->request->getVar('totalrp'),
            );
            $data3 = array(
                'kodespl' => $this->request->getVar('kodespl'),
                'tglbeli'=>date('Y-m-d H:i:s'),
                'totalhutang'=> $this->request->getVar('totalrp') - $this->request->getVar('diskonrp')
            );
            
            $qty = $this->detailbeli->selectqty($notransaksi);
            if($qty[0]['qty'] < $this->request->getVar('qty') ){
                $selisih = $this->request->getVar('qty')- $qty[0]['qty'];
                $stok = $this->stok->selectwhere($this->request->getVar('kodebrg'));
                $data4 = array(
                    'qty'=>$stok[0]['qtybeli'] - $selisih
                );
               ;
                $stokupdate = $this->stok->updateData($this->request->getVar('kodebrg'),$data4);
            }else if($qty[0]['qty'] > $this->request->getVar('qty') ){
                $selisih = $qty[0]['qty'] - $this->request->getVar('qty');
                $stok = $this->stok->selectwhere($this->request->getVar('kodebrg'));
                $data4 = array(
                    'qty'=>$stok[0]['qtybeli'] + $selisih
                );
                $stokupdate = $this->stok->updateData($this->request->getVar('kodebrg'),$data4);
            }
            $header = $this->headerbeli->updateData($notransaksi,$data);
            $detail = $this->detailbeli->updateData($notransaksi,$data2);
            $hutang = $this->hutang->updateData($notransaksi,$data3);
        
        $msg = [
            'sukses' =>[
                'url' => '/barang'
            ]
            ];
        return json_encode($msg);
    }
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $qty = $this->detailbeli->selectqty($id);
        $stok = $this->stok->selectwhere($qty[0]['kodebrg']);
        $data4 = array(
            'qty'=>$stok[0]['qtybeli'] + $qty[0]['qty']
        );
        $stokupdate = $this->stok->updateData($qty[0]['kodebrg'],$data4);
        $delete1 = $this->headerbeli->deleteData($id);
        $delete2 = $this->detailbeli->deleteData($id);
        $delete3 = $this->hutang->deleteData($id);
        return json_encode($delete3);
    }
   



}