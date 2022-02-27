<?php
class Model_page extends CI_Model
{

	function tampil($table){
		return $this->db->get_where($table);
	}

	function tambah($table,$data){
		$this->db->insert($table,$data);
	}

	function edit($where,$table){		
		return $this->db->get_where($table,$where);
	}	

	function hapus($table,$where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function tampil_pesanan($id_pelanggan)
	{
		return $this->db->get_where('tbl_pesanan',array('id_pelanggan'=>$id_pelanggan));
	}
	function tampil_pesanan1($id_pelanggan)
	{
		return $this->db->get_where('tbl_kirim',array('id_pelanggan'=>$id_pelanggan));
	}
}