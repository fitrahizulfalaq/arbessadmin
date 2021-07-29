<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	
	//Kode akses
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('email',$post['username']);
		$this->db->where('status','1');
		$this->db->where('password',sha1($post['password']));
		$query = $this->db->get();
		return $query; 
	}

	public function get($id = null)
	{
		$this->db->from('tb_user');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}



	//////////////////////
	/////////////////////
	/// PROFIL
	///////////////////	
	///////////////////
	function update_profil($post)
	{
	  //Id	  
	  $params['id'] =  $post['id'];
	  // Kebutuhan User
	  $params['username'] =  $post['username'];
	  if ($post['password'] != null) {
		  $params['password'] =  sha1($post['password']);	  	
	  }
	  $params['nama'] =  $post['nama'];
	  $params['tempat_lahir'] =  $post['tempat_lahir'];
	  $params['tgl_lahir'] =  $post['tgl_lahir'];
	  $params['hp'] =  $post['hp'];
	  $params['kelamin'] =  $post['kelamin'];
	  $params['domisili'] =  $post['domisili'];
	  	if ($post['foto'] != null) {
	  	  $params['foto'] =  $post['foto'];
	  	} else {
	  	  $params['foto'] =  "";
	  	}

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_user',$params);
	}	

	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete('tb_user');

	}

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
	  $params['created'] =  date("Y:m:d:h:i:sa");
	  $params['tipe_user'] =  "1";
	  $this->db->insert('tb_user',$params);
	}	
}
