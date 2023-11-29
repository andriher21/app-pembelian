<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianDetailModel extends Model
{
	protected $table = 'tbl_dbeli';
	protected $primaryKey = 'iddbeli';
	
	protected $returnType = 'array';
	protected $useSoftDeletes = false;
	
	protected $allowedFields = ['notransaksi','kodebarang','hargabeli','qty','diskon','diskonrp','totalrp' ];
	
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
	public function selectqty($notransaksi){
		$db = db_connect();
		$sql = "SELECT qty, kodebrg FROM tbl_dbeli WHERE notransaksi = ?";
		$data = $db->query($sql,$notransaksi)->getresultArray();
		return $data;
	}
	public function insertData($data)
	{
		$db = db_connect();
		$sql = "INSERT INTO tbl_dbeli (notransaksi,kodebrg,hargabeli,qty,diskon,diskonrp,totalrp) VALUES 
		(" . $db->escape($data['notransaksi']) . "," . $db->escape($data['kodebrg']) .
                "," . $db->escape($data['hargabeli']) ."," . $db->escape($data['qty']) 
				."," . $db->escape($data['diskon'])."," . $db->escape($data['diskonrp'])
				."," . $db->escape($data['totalrp'])   .")";
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
		$sql = "UPDATE tbl_dbeli SET kodebrg= " . $db->escape($data['kodebrg']) .", hargabeli = " . $db->escape($data['hargabeli']). "
		, qty= " . $db->escape($data['qty']) .", diskon = " . $db->escape($data['diskon']) . "
		, diskonrp= " . $db->escape($data['diskonrp']) .", totalrp = " . $db->escape($data['totalrp'])
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
		$sql = "DELETE FROM tbl_dbeli WHERE notransaksi = " . $db->escape($id) ." ";
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