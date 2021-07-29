<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_user_tmp');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}
	
	/*
		Untuk mempercepat transaksi, tidak perlu verifikasi
		Bisa langsung mengisi
	*/
	function simpan($post)
	{
	  $params['id'] =  "";
	  $params['username'] =  $post['username'];
	  $params['password'] =  sha1($post['password']);
	  $params['nama'] =  $post['nama'];
	  $params['tempat_lahir'] =  ucwords(strtolower($post['tempat_lahir']));
	  $params['tgl_lahir'] =  $post['tgl_lahir'];
	  $params['kelamin'] =  $post['kelamin'];
	  $params['hp'] =  $post['hp'];
	  $params['email'] =  $post['email'];
	  $params['domisili'] =  ucwords(strtolower($post['domisili']));	  
	  $params['foto'] =  $post['foto'];
	  $params['created'] =  date("Y:m:d:h:i:sa");
	  $params['tipe_user'] =  "1";
	  $this->db->insert('tb_user',$params);
	}

	
	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete('tb_user_tmp');

	}


}
