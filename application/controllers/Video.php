<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('video_m');
	}

	public function index()
	{		
		$data['menu'] = "Update Video Terbaru";

		//Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('video/index');
		$config['total_rows'] = $this->video_m->get()->num_rows(); 		
		$config['per_page'] = 10;
		//Halaman
		$config['start'] = $this->uri->segment(3);
		//Style Pagination
		$config['first_link']       = 'Awal';
	    $config['last_link']        = 'Terakhir';
	    $config['next_link']        = '>>';
	    $config['prev_link']        = '<<';
	    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	    $config['full_tag_close']   = '</ul></nav></div>';
	    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	    $config['num_tag_close']    = '</span></li>';
	    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['prev_tagl_close']  = '</span>Next</li>';
	    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	    $config['first_tagl_close'] = '</span></li>';
	    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		//Mulai
		$data['row'] = $this->video_m->get_video($config['per_page'],$config['start']);

		$this->templateadmin->load('template/dashboard','video/video_data',$data);
	}

	public function kategori()
	{		
		$kode = $this->uri->segment(3);
		$dataVideo = $this->fungsi->pilihan_advanced("cat_video","kode",$kode)->row();
		if ($dataVideo == null) {
			$this->session->set_flashdata('warning', 'Video Tidak Ditemukan');
			redirect('page/videoMenu/');
		}
		$kategori_id = $dataVideo->id;

		$data['menu'] = "Video ".$dataVideo->deskripsi;
		//Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('video/kategori/index');
		$config['total_rows'] = $this->video_m->getByKategori($kategori_id)->num_rows(); 		
		$config['per_page'] = 10;
		//Halaman
		$config['start'] = $this->uri->segment(4);
		//Style Pagination
		$config['first_link']       = 'Awal';
	    $config['last_link']        = 'Terakhir';
	    $config['next_link']        = '>>';
	    $config['prev_link']        = '<<';
	    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	    $config['full_tag_close']   = '</ul></nav></div>';
	    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	    $config['num_tag_close']    = '</span></li>';
	    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['prev_tagl_close']  = '</span>Next</li>';
	    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	    $config['first_tagl_close'] = '</span></li>';
	    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		//Mulai
		$data['row'] = $this->video_m->get_video($config['per_page'],$config['start'],$kategori_id);

		$this->templateadmin->load('template/dashboard','video/video_data',$data);
	}

	public function detail($id)
	{					
		$query = $this->video_m->get($id);
		if ($query->num_rows() > 0) {
			$data['data'] = $query->row();
			$data['menu'] = "Edukasi Video";			
			$this->templateadmin->load('template/dashboard','video/video_detail',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('user')."';</script>";
		}				    
	}

	public function tambah()
	{
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->fungsi->user_login()->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|is_unique[tb_video.judul]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data Video";
			$this->templateadmin->load('template/dashboard','video/tambah',$data);
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        
	        //CEK GAMBAR
	        $config['upload_path']          = 'assets/dist/img/foto-video/';
	        $config['allowed_types']        = 'jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['file_name']            = strtoupper($post['judul']);

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
			  	if ($this->upload->do_upload('foto')) {
			  	 	$post['foto'] = $this->upload->data('file_name'); 	        		
	        	} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger',$pesan);
					redirect('video/tambah');
	        	}	  	 	
			}
			 
			$this->video_m->simpan($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Publish');
	    	}	  	 	
	        redirect('video');	        	
	    }
	}

	public function edit($id)
	{			
		//Mencegah user yang bukan haknya
		$previllage = 2;
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
			$query = $this->video_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data video";			
				$this->templateadmin->load('template/dashboard','video/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('video')."';</script>";
			}
			
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        
	        //CEK GAMBAR
	        $config['upload_path']          = 'assets/dist/img/foto-video/';
	        $config['allowed_types']        = 'jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['file_name']            = strtoupper($post['judul']);

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
			  	if ($this->upload->do_upload('foto')) {

			  		$itemfoto = $this->video_m->get($post['id'])->row();
			  		if ($itemfoto->foto != null) {
			  			$target_file = 'assets/dist/img/foto-video/'.$itemfoto->foto;
			  			unlink($target_file);
			  		}

			  	 	$post['foto'] = $this->upload->data('file_name');

	        	} else {
					$pesan = $this->upload->display_errors();
					$this->session->set_flashdata('danger',$pesan);
					redirect('video/edit/'.$id);
	        	}	  	 	
			}
			 
			$this->video_m->update($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Edit');
	    	}	  	 	
	        redirect('video');
	    }
	}

	function hapusfoto(){
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);

	  $id = $this->uri->segment(3);
		

		//Action		  
		$itemfoto = $this->video_m->get($id)->row();
  		if ($itemfoto->foto != null) {
  			$target_file = 'assets/dist/img/foto-video/'.$itemfoto->foto;
  			unlink($target_file);
  		}
  		$params['foto'] = "";
  		$this->db->where('id',$id);
	  	$this->db->update('tb_video',$params);
	  	redirect('video/edit/'.$id);	  
	}

	function hapus(){
		//Mencegah user yang bukan haknya
		$previllage = 2;
		check_super_user($this->session->tipe_user,$previllage);

	  $id = $this->uri->segment(3);

		$itemfoto = $this->video_m->get($id)->row();		
  		if ($itemfoto->foto != null) {
  			$target_file = 'assets/dist/img/foto-video/'.$itemfoto->foto;
  			unlink($target_file);
  		}
		
		$this->video_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('video');
	}

		
}
