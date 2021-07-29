<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('materi_m');
	}

	public function index()
	{		
		$data['menu'] = "Data Materi";
		$data['row'] = $this->materi_m->get();

		$this->templateadmin->load('template/dashboard','materi/materi_data',$data);
	}

	public function detail($id)
	{					
		$query = $this->materi_m->get($id);
		if ($query->num_rows() > 0) {
			$data['url'] = base_url('assets/dist/files/materi/'.$query->row("file"));
			$data['menu'] = "Lihat materi";
			$this->templateadmin->load('template/dashboard','materi/materi_detail',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('user')."';</script>";
		}				    
	}

	public function tambah()
	{
		//Mencegah user yang bukan haknya
		$previllage = 1;
		check_super_user($this->fungsi->user_login()->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|is_unique[tb_materi.judul]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data materi";
			$this->templateadmin->load('template/dashboard','materi/tambah',$data);
	    } else {
        $post = $this->input->post(null, TRUE);	                        

       

				//CEK GAMBAR
        $config2['upload_path']          = 'assets/dist/files/materi/';
        $config2['allowed_types']        = 'doc|docx|pdf|ppt|pptx';
        $config2['max_size']             = 6000;
        $config2['file_name']            = 'Materi-'.date("Ymdhis");

				$upload_2 = $this->load->library('upload', $config2);
				if (@$_FILES['file']['name'] != null) {
						$this->upload->initialize($config2);
				  	if ($this->upload->do_upload('file')) {
				  	 	$post['file'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('materi/tambah');
		        }
		    }				
			 
				$this->materi_m->simpan($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Publish');
	    	}	  	 	
	      redirect('materi');	        	
	    }
	}

	public function edit($id)
	{			
		//Mencegah user yang bukan haknya
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->materi_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data materi";			
				$this->templateadmin->load('template/dashboard','materi/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('materi')."';</script>";
			}
			
	    } else {
	      $post = $this->input->post(null, TRUE);	        
	        
	    

				//CEK GAMBAR
        $config2['upload_path']          = 'assets/dist/files/materi/';
        $config2['allowed_types']        = 'doc|docx|pdf|ppt|pptx';
        $config2['max_size']             = 6000;
        $config2['file_name']            = 'Materi-'.date("Ymdhis");

				$upload_2 = $this->load->library('upload', $config2);
				if (@$_FILES['file']['name'] != null) {
						$this->upload->initialize($config2);
				  	if ($this->upload->do_upload('file')) {
				  	 	$post['file'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('materi/tambah');
		        }
		    }
			 
				$this->materi_m->update($post);
		    	if ($this->db->affected_rows() > 0) {
		    		$this->session->set_flashdata('success','Berhasil Di Edit');
		    	}	  	 	
		        redirect('materi');
		    }
	}

	function hapusfile(){
		//Mencegah user yang bukan haknya
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);

	  	$id = $this->uri->segment(3);
		//Action		  
		$itemfile = $this->materi_m->get($id)->row();
  		if ($itemfile->file != null) {
  			$target_file = 'assets/dist/files/materi/'.$itemfile->file;
  			unlink($target_file);
  		}
  		$params['file'] = "";
  		$this->db->where('id',$id);
	  	$this->db->update('tb_materi',$params);
	  	redirect('materi/edit/'.$id);	  
	}

	function hapus(){
		//Mencegah user yang bukan haknya
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);

	  	$id = $this->uri->segment(3);

		$itemmateri = $this->materi_m->get($id)->row();
		if ($itemmateri->file != null) {
			$target_file = 'assets/dist/files/materi/'.$itemmateri->file;
			unlink($target_file);
		}
		
		$this->materi_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('materi');
	}

		
}
