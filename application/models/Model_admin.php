<?php
class Model_admin extends CI_Model
{

	function semua($table) {
    return $this->db->get($table);
	}

	function tampil($table){
		return $this->db->get($table);
	}

	function hapus($table,$where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function join(){
		$this->db->select('*');
		$this->db->from('tbl_pesanan');
		$this->db->join('tbl_pelanggan','tbl_pelanggan.id = tbl_pesanan.id_pelanggan');      
		$query = $this->db->get();
		return $query;
 }

 function join2(){
	$this->db->select('*');
	$this->db->from('tbl_kirim');
	$this->db->join('tbl_pelanggan','tbl_pelanggan.id = tbl_kirim.id_pelanggan');      
	$query = $this->db->get();
	return $query;
}
}