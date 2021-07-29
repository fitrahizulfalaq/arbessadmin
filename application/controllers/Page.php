<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		redirect("dashboard");
	}

	public function tentang()
	{
		$data['menu'] = "Tentang Pengembang";
		$this->templateadmin->load('template/dashboard','page/tentang',$data);
	}

	public function petunjuk()
	{
		$data['menu'] = "Petunjuk";
		$this->templateadmin->load('template/dashboard','page/petunjuk',$data);
	}

	public function pembuat()
	{
		$data['menu'] = "Biodata Pembuat";
		$this->templateadmin->load('template/dashboard','page/pembuat',$data);
	}

	public function kursusMenu()
	{
		$data['menu'] = "Menu Materi";
		$this->templateadmin->load('template/dashboard','page/kursusMenu',$data);
	}

	public function materiMenu()
	{
		$data['menu'] = "Menu Materi";
		$this->templateadmin->load('template/dashboard','page/materiMenu',$data);
	}

	public function videoMenu()
	{
		$data['menu'] = "Menu Video";
		$this->templateadmin->load('template/dashboard','page/videoMenu',$data);
	}

	public function videoTeknikDasar()
	{
		$data['menu'] = "Video Teknik Dasar";
		$this->templateadmin->load('template/dashboard','page/videoTeknikDasar',$data);
	}

	public function videoSeni()
	{
		$data['menu'] = "Video Seni";
		$this->templateadmin->load('template/dashboard','page/videoSeni',$data);
	}

	public function videoJurusDasar()
	{
		$data['menu'] = "Video Jurus Dasar";
		$this->templateadmin->load('template/dashboard','page/videoJurusDasar',$data);
	}

	public function evaluasiMenu()
	{
		$data['menu'] = "Evaluasi";
		$this->templateadmin->load('template/dashboard','page/evaluasiMenu',$data);
	}

	public function evaluasiKenaikanTingkat()
	{
		$data['menu'] = "Evaluasi Kenaikan Tingkat";
		$this->templateadmin->load('template/dashboard','page/evaluasiKenaikanTingkat',$data);
	}

	public function embed()
	{
		$kode = $this->uri->segment(3);
		$dataEmbed = $this->fungsi->pilihan_advanced("tb_embed","kode",$kode)->row();
		if ($dataEmbed == null) {
			$this->session->set_flashdata('warning', 'Data tidak ditemukan');
			redirect('dashboard');
		}
		$data['menu'] = $dataEmbed->deskripsi;
		$data['link'] = $dataEmbed->link;
		$this->templateadmin->load('template/dashboard','page/embed',$data);
	}
}
