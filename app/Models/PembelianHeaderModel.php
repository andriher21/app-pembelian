<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianHeaderModel extends Model
{
	protected $table = 'tbl_hbeli';
	protected $primaryKey = 'idhbeli';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['notransaksi','kodespl','tglbeli' ];
	
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
	public function selectall(){
		$db = db_connect();
		$sql = "SELECT a.*, b.namaspl FROM tbl_hbeli a LEFT JOIN tbl_suplier b ON a.kodespl = b.kodespl";
		$data = $db->query($sql)->getresultArray();
		return $data;
	}
	public function selectmax(){
		$db = db_connect();
		$sql = "SELECT MAX(notransaksi) as kodemax FROM tbl_hbeli";
		$data = $db->query($sql)->getresultArray();
		return $data;
	}
	
	public function selectwherejoin($id)
	{	$db = db_connect();
		$sql = "SELECT a.*,b.*, c.namaspl, d.namabrg, e.totalhutang FROM tbl_hbeli a LEFT JOIN tbl_dbeli b
		 ON a.notransaksi = b.notransaksi LEFT JOIN tbl_suplier c ON a.kodespl = c.kodespl 
		 LEFT JOIN tbl_barang d ON b.kodebrg = d.kodebrg LEFT JOIN tbl_hutang e ON 
		 a.notransaksi = e.notransaksi WHERE a.idhbeli= ?";
		$data = $db->query($sql,$id)->getResultArray();
		return $data;
	}
	public function insertData($data)
	{
		$db = db_connect();
		$sql = "INSERT INTO tbl_hbeli (notransaksi,kodespl,tglbeli) VALUES 
		(" . $db->escape($data['notransaksi']) . "," . $db->escape($data['kodespl']) .
                "," . $db->escape($data['tglbeli'])  .")";
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
		$sql = "UPDATE tbl_hbeli SET kodespl= " . $db->escape($data['kodespl']) 
		." WHERE notransaksi = " . $db->escape($id) ."";
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
		$sql = "DELETE FROM tbl_hbeli WHERE notransaksi = " . $db->escape($id) ." ";
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
	
	
}