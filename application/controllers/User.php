<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        check_not_login();
        $this->load->model('user_m');
    }
 
    function index(){
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);
        $data['menu'] = "Data  User";
        $data['row'] = $this->user_m->get();
        $this->templateadmin->load('template/dashboard','user/user_data',$data);
    }
 
    public function tambah()
    {
        //Mencegah user yang bukan haknya
        $previllage = 2;
        check_super_user($this->fungsi->user_login()->tipe_user,$previllage);

        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('username', 'username', 'min_length[3]|is_unique[tb_user.username]|max_length[20]');
        $this->form_validation->set_rules('password', 'password', 'min_length[3]|max_length[20]');

        //Pesan yang ditampilkan
        $this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
        $this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Data sudah ada');
        //Tampilan pesan error
        $this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = "Tambah Data User";
            $this->templateadmin->load('template/dashboard','user/tambah',$data);
        } else {
            $post = $this->input->post(null, TRUE);         
            
            //CEK GAMBAR
            $config['upload_path']          = 'assets/dist/img/foto-user/';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 5000;
            $config['file_name']            = strtoupper($post['nama']);

            $this->load->library('upload', $config);
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');                   
                } else {
                    $pesan = $this->upload->display_errors();
                    $this->session->set_flashdata('danger',$pesan);
                    redirect('user/tambah');
                }           
            } 
            $this->user_m->simpan($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Berhasil Di Publish');
            }           
            redirect('user');               
        }
    }

    public function edit($id)

    {           
        //Load librarynya dulu
        $this->load->library('form_validation');
        //Atur validasinya
        $this->form_validation->set_rules('username', 'username', 'min_length[3]');
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
                $this->templateadmin->load('template/dashboard','user/edit',$data);
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
                        redirect('user/edit/'.$id);
            }           
            }


                $this->user_m->update_profil($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success','Berhasil Di Edit');
            }
              redirect('user');
        }
    }

    function hapusfoto(){
        //Mencegah user yang bukan haknya
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);

        $id = $this->uri->segment(3);
        
        //Action          
        $itemfoto = $this->user_m->get($id)->row();
        if ($itemfoto->foto != null) {
            $target_file = 'assets/dist/img/foto-user/'.$itemfoto->foto;
            unlink($target_file);
        }
        $params['foto'] = "";
        $this->db->where('id',$id);
        $this->db->update('tb_user',$params);
        redirect('user/edit/'.$id);   
    }

    function hapus(){
        //Mencegah user yang bukan haknya
        $previllage = 2;
        check_super_user($this->session->tipe_user,$previllage);

        $id = $this->uri->segment(3);
        
        //Mencegah Hapus Diri Sendiri
        if ($this->session->userdata('id') == $id or $this->session->userdata('tipe_user') < $this->fungsi->pilihan_selected("tb_user",$id)->row("tipe_user")) {
            $this->session->set_flashdata('warning','Tidak Bisa Menghapus Diri Sendiri ataupun Menghapus Kategori User diatasnya');
            redirect('user');
        }

        $itemfoto = $this->user_m->get($id)->row();     
        if ($itemfoto->foto != null) {
            $target_file = 'assets/dist/img/foto-user/'.$itemfoto->foto;
            unlink($target_file);
        }
        
        $this->user_m->hapus($id);
        $this->session->set_flashdata('danger','Berhasil Di Hapus');
        redirect('user');
    }

    public function profil($id)

    {                   
        //Mencegah Edit Data Kategori diatasnya
        if ($this->session->userdata('tipe_user') < 2 and $this->session->userdata('id') != $id) {
            $this->session->set_flashdata('warning','Hanya Bisa Melihat Profil Diri Sendiri');
            redirect('user/profil/'.$this->session->userdata('id'));
        }

        $query = $this->user_m->get($id);
        if ($query->num_rows() > 0) {
            $data['row'] = $query->row();
            $data['menu'] = "Profil User";          
            $this->templateadmin->load('template/dashboard','user/profil_data',$data);
        } else {
            echo "<script>alert('Data Tidak Ditemukan');</script>";
            echo "<script>window.location='".site_url('user')."';</script>";
        }                   
    }


    //Perintah Semua Disini
    function get_kota(){
        $id=$this->input->post('id');
        $data=$this->user_m->get_kota($id);
        echo json_encode($data);
    }
 
}