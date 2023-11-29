<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
	protected $table = 'tbl_barang';
	protected $primaryKey = 'idbrg';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['kodebrg','nama_brg','satuan','harga_beli' ];
	
	protected $useTimestamps = false;
	
	// protected $validationRules    = [
    //     'company_name' => 'required|min_length[5]',
    //     'company_address' => 'required|min_length[5]',
    // ];
	
	// protected $validationMessages = [
    //     'customername' => [
    //         'required' => 'Bagian Name Harus diisi',
    //         'min_length' => 'Minimal 5 Karakter'
    //     ],
    //     'customeraddr' => [
    //         'required' => 'Bagian Addr Harus diisi',
    //         'min_length' => 'Minimal 5 Karakter'
    //     ]
    // ];
    protected $skipValidation  = false;
	
	public function selectall()
	{	$db = db_connect();
		$sql = "SELECT a.*, b.qtybeli FROM tbl_barang a LEFT JOIN tbl_stock b ON a.kodebrg = b.kodebrg";
		$data = $db->query($sql)->getResultArray();;
		return $data;
	}
	public function selectwhere($id)
	{	$db = db_connect();
		$sql = "SELECT a.*,b.qtybeli FROM tbl_barang a LEFT JOIN tbl_stock b ON a.kodebrg = b.kodebrg
		 WHERE a.idbrg = ?";
		$data = $db->query($sql,$id)->getResultArray();
		return $data;
	}
	public function selectWhereid($id){
		$db = db_connect();
		$sql = "SELECT kodebrg FROM tbl_barang WHERE idbrg = ?";
		$data = $db->query($sql,$id)->getResultArray();
		return $data;
	}
	public function insertData($data)
	{
		$db = db_connect();
		$sql = "INSERT INTO tbl_barang (kodebrg,namabrg,satuan,hargabeli) VALUES 
		(" . $db->escape($data['kodebrg']) . "," . $db->escape($data['namabrg']) .
                "," . $db->escape($data['satuan']) . "," . $db->escape($data['hargabeli'])  .")";
		$insert =  $db->query($sql);
		if ($insert) {
			return ([
			    'status'=> 0,
                'message'=>'new data created'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to create new data']);
		}
	}
	
	public function updateData($id,$data)
	{
		$db = db_connect();
		$sql = "UPDATE tbl_barang SET kodebrg = " . $db->escape($data['kodebrg']) . "
		, namabrg= " . $db->escape($data['namabrg']) .", satuan = " . $db->escape($data['satuan']) . "
		, hargabeli=" . $db->escape($data['hargabeli'])  ." WHERE idbrg = " . $db->escape($id) ."";
		$update =  $db->query($sql);
		if ($update) {
			return ([
			    'status'=> 0,
                'message'=>'update  done'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to update data']);
		}
	}
	
	public function deleteData($id)
	{
		$db = db_connect();
		$sql = "DELETE FROM tbl_barang WHERE idbrg = " . $db->escape($id) ." ";
		$delete= $db->query($sql);
			if ($delete) {
			return ([
			    'status'=> 0,
                'message'=>'delete trans done'
			    ]);
		} else {
			return ([
			    'status'=> 2,
                    'message' => 'failed to delete trans']);
		}
	}
	public function autofill($id){
		$db = db_connect();
		$sql = "SELECT hargabeli FROM tbl_barang WHERE kodebrg = ?";
		$data = $db->query($sql,$id)->getResultArray();
		return $data;
	}
	
}