<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('user_m');
	}

	public function index()
	{
		$previllage	= 1;
		check_super_user($this->session->tipe_user,$previllage);

		$id = $this->session->id;
	    $query = $this->user_m->get($id);
	    if ($query->num_rows() > 0) {
	        $data['row'] = $query->row();
	        $data['menu'] = "Profil User";          
	        $this->templateadmin->load('template/dashboard','profil/profil_data',$data);
	    } else {
	        echo "<script>alert('Data Tidak Ditemukan');</script>";
	        echo "<script>window.location='".site_url('user')."';</script>";
	    }
	}

	public function edit($id)

	{			
		//Mencegah user yang bukan haknya
		check_right_user($this->session->id,$this->uri->segment(3));
		
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('username', 'username', 'min_length[3]|alpha_dash');
		$this->form_validation->set_rules('nama', 'nama', 'min_length[3]|max_length[50]');
		$this->form_validation->set_rules('password', 'password', 'min_length[8]');


		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');

		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');


		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
			$data['menu'] = "Edit Data User";			
				$this->templateadmin->load('template/dashboard','profil/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('user')."';</script>";
			}

	  } else {
      $post = $this->input->post(null, TRUE);	        

      //CEK GAMBAR
      $config['upload_path']          = 'assets/dist/img/foto-user/';
      $config['allowed_types']        = 'jpg|png|jpeg';
      $config['max_size']             = 1000;
      $config['file_name']            = strtoupper($post['username']).'--'.$post['hp'];

			$this->load->library('upload', $config);
			if (@$_FILES['foto']['name'] != null) {
			  	if ($this->upload->do_upload('foto')) {
			  		$itemfoto = $this->user_m->get($post['id'])->row();
			  		if ($itemfoto->foto != null) {
			  			$target_file = 'assets/dist/img/foto-user/'.$itemfoto->foto;
			  			unlink($target_file);
			  		}

			  	 	$post['foto'] = $this->upload->data('file_name');
	        } else {
						$pesan = $this->upload->display_errors();
						$this->session->set_flashdata('danger',$pesan);
						redirect('profil/edit/'.$id);
	        }	  	 	
			}


				$this->user_m->update_profil($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Edit');
	    	}
		      redirect('profil');
	    }
	}

	function hapusfoto(){
    //Mencegah user yang bukan haknya
	check_right_user($this->session->id,$this->uri->segment(3));

	$id = $this->uri->segment(3);

    //Action          
    $this->load->model('user_m');
    $itemfoto = $this->user_m->get($id)->row();
    if ($itemfoto->foto != null) {
        $target_file = 'assets/dist/img/foto-user/'.$itemfoto->foto;
        unlink($target_file);
    }
    $params['foto'] = null;
    $this->db->where('id',$id);
    $this->db->update('tb_user',$params);
    redirect('profil/edit/'.$id);   
	}


	public function printCertificate()
	{
		$konten = "page/certificate/userCertificate";
		$filename = "Sertifikat Keanggotaan - ".$this->session->nama;
		$data['nama'] = $this->session->nama;
		$data['no_anggota'] = $this->fungsi->pilihan_selected("tb_user",$this->session->id)->row("id_anggota");
		$data['ketua'] = $this->fungsi->pilihan_advanced("setting","kode","ketua")->row("keterangan");
		$this->fungsi->print($konten,$filename,$data);
	}
}
