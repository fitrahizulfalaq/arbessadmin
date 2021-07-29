<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_video');
		if ($id != null) {
			$this->db->where('id',$id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function getByKategori($id = null) 
	{
		$this->db->from('tb_video');
		$this->db->where('kategori_id',$id);
		$query = $this->db->get();
		return $query;
	}

	public function get_video($limit, $start, $kategori_id = null) 
	{		
		$this->db->order_by('created','DESC');
		if ($kategori_id != null) {
			$this->db->where('kategori_id',$kategori_id);
		}
		$query = $this->db->get('tb_video',$limit, $start);
		return $query;
	}	

	function simpan($post)
	{
		if ($post['judul'] == "") {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('error','Ojo Main refresh ae bat...');
			redirect('video/tambah');
		}

	  $params['id'] =  "";
	  $params['kategori_id'] =  $post['kategori_id'];
	  $params['judul'] =  ucwords($post['judul']);
	  $params['deskripsi'] =  $post['deskripsi'];
	  $params['link'] =  $post['link'];
	  $params['foto'] =  $post['foto'];
	  $params['user_id'] =  $this->session->id;
	  $params['created'] =  $post['created'];

	  $this->db->insert('tb_video',$params);	  	 		  	 		   			
	}

	function update($post)
	{

	  $params['id'] =  $post['id'];
	  $params['judul'] =  ucwords($post['judul']);
	  $params['deskripsi'] =  $post['deskripsi'];
	  $params['link'] =  $post['link'];
	  $params['user_id'] =  $this->session->id;
	  $params['created'] =  $post['created'];
	  
	  if ($post['foto'] != null) {
  	  	$params['foto'] =  $post['foto'];
  	}

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_video',$params);	  	 		  	 		   			
	}

	function hapus($id){

	  $this->db->where('id', $id);
	  $this->db->delete('tb_video');

	}



}
