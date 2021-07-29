<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_pertanyaan');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$this->db->order_by("pertemuan_id","asc");
		$this->db->order_by("created","asc");
		$query = $this->db->get();
		return $query;

	}

	function hapus($id){
	  $this->db->where('id', $id);
	  $this->db->delete('tb_pertanyaan');

	}	

	function update($post)
	{
		  
	  $params['id'] =  $post['id'];
  	  $params['jawaban'] =  $post['jawaban'];	  
  	  

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_pertanyaan',$params);

	}

}
