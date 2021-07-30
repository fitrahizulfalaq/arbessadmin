<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_tugas');
		if ($id != null) {
			$this->db->where('id',$id);
		}

		$this->db->order_by("pertemuan_id","asc");
		$this->db->order_by("created","asc");
		$query = $this->db->get();
		return $query;
	}

	function simpan($post)
	{
		if ($post['judul'] == "") {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('error','Ojo Main refresh ae bat...');
			redirect('tugas/tambah');
		}

	  $params['id'] =  "";
	  $params['pertemuan_id'] =  $post['pertemuan_id'];
	  $params['judul'] =  $post['judul'];
	  $params['file'] =  $post['file'];
	  $params['created'] =  date("Y:m:d:H:i:sa");

	  $this->db->insert('tb_tugas',$params);	  	 		  	 		   			
	}

	function update($post)
	{
	  $params['id'] =  $post['id'];
	  $params['judul'] =  $post['judul'];
	  $params['created'] =  $post['created'];
	  
		 if ($post['file'] != null) {
	  	  	$params['file'] =  $post['file'];
	  	}

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_tugas',$params);	  	 		  	 		   			
	}

	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete('tb_tugas');
	}

	



}
