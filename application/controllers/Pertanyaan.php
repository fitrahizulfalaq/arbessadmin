<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('pertanyaan_m');
	}

	public function index()
	{		
		$data['menu'] = "Data Pertanyaan";
		$data['row'] = $this->pertanyaan_m->get();

		$this->templateadmin->load('template/dashboard','pertanyaan/pertanyaan_data',$data);
	}

	function hapus(){	
	  $id = $this->uri->segment(3);
	  $this->pertanyaan_m->hapus($id);
	  $this->session->set_flashdata('danger','Berhasil Di Hapus');
	  redirect('pertanyaan');
	}


	public function jawab($id)
	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('jawaban', 'jawaban', 'min_length[3]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->pertanyaan_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Jawab Pertanyaan";			
				$this->templateadmin->load('template/dashboard','pertanyaan/jawab',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('pertanyaan')."';</script>";
			}
			
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->pertanyaan_m->update($post);
	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Di Jawab');
	        }	
	        redirect('pertanyaan');
	    }
	}	
}
