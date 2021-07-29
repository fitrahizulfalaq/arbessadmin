<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Embed extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('embed_m');
	}

	public function index()
	{		
		$data['menu'] = "Data embed";
		$data['row'] = $this->embed_m->get();
		$this->templateadmin->load('template/dashboard','embed/embed_data',$data);
	}

	public function edit($id)
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('link', 'link', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->embed_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data embed";			
				$this->templateadmin->load('template/dashboard','embed/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('embed')."';</script>";
			}
			
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->embed_m->update($post);
	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Di Edit');
	        	redirect('embed');
	        }	
	    }
	}	
}
