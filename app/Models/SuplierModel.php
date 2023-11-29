<?php

namespace App\Models;

use CodeIgniter\Model;

class SuplierModel extends Model
{
	protected $table = 'tbl_suplier';
	protected $primaryKey = 'idspl';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['kodespl','namaspl' ];
	
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
		$sql = "SELECT * FROM tbl_suplier";
		$data = $db->query($sql)->getResultArray();;
		return $data;
	}
	public function selectwhere($id)
	{	$db = db_connect();
		$sql = "SELECT * FROM tbl_suplier where idspl = ?";
		$data = $db->query($sql,$id)->getResultArray();;
		return $data;
	}
	public function insertData($data)
	{
		$db = db_connect();
		$sql = "INSERT INTO tbl_suplier (kodespl,namaspl) VALUES 
		(" . $db->escape($data['kodespl']) . "," . $db->escape($data['namaspl'])   .")";
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
		$sql = "UPDATE tbl_suplier SET kodespl= " . $db->escape($data['kodespl'])."
		, namaspl= " . $db->escape($data['namaspl']) ." WHERE idspl = " . $db->escape($id) ."";
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
		$sql = "DELETE FROM tbl_suplier WHERE idspl= " . $db->escape($id) ." ";
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