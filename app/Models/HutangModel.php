<?php

namespace App\Models;

use CodeIgniter\Model;

class HutangModel extends Model
{
	protected $table = 'tbl_hutang';
	protected $primaryKey = 'idhutang';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['notransaksi','kodespl','tglbeli','totalhutang' ];
	
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
		$sql = "SELECT a.*, b.namaspl FROM tbl_hutang a LEFT JOIN tbl_suplier b ON a.kodespl = b.kodespl";
		$data = $db->query($sql)->getResultArray();;
		return $data;
	}
	public function selectwhere($id)
	{	$db = db_connect();
		$sql = "SELECT a.*, b.namaspl FROM tbl_hutang a LEFT JOIN tbl_suplier b ON a.kodespl = b.kodespl
		WHERE idhutang= ?";
		$data = $db->query($sql,$id)->getResultArray();;
		return $data;
	}
	public function insertData($data)
	{
		$db = db_connect();
		$sql = "INSERT INTO tbl_hutang (notransaksi,kodespl,tglbeli,totalhutang) VALUES 
		(" . $db->escape($data['notransaksi']) . "," . $db->escape($data['kodespl'])  .
		 "," . $db->escape($data['tglbeli']). "," . $db->escape($data['totalhutang']) .")";
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
		$sql = "UPDATE tbl_hutang SET kodespl= " . $db->escape($data['kodespl'])."
		, totalhutang= " . $db->escape($data['totalhutang'])   
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
		$sql = "DELETE FROM tbl_hutang WHERE notransaksi= " . $db->escape($id) ." ";
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