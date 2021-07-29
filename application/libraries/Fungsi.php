<?php 

class Fungsi {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('user_m');
		$userid = $this->ci->session->userdata('id');
		$query = $this->ci->user_m->get($userid)->row();
		return $query;
	}

	function pilihan($tabel) {		
		$query = $this->ci->db->get($tabel);
		return $query;
	}

	function pilihan_selected($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get();
		return $query;
	}

	function pilihan_advanced($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel);
		return $query;
	}


	// Result Cepat
	function get_deskripsi($tabel,$id) {		
		$this->ci->db->from($tabel);
		$this->ci->db->where('id',$id);
		$query = $this->ci->db->get()->row("deskripsi");
		return $query;
	}

	function get_deskripsi_advanced($tabel,$kode,$id,$perintah) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->row($perintah);
		return $query;
	}

	function isSelected($table, $condition, $value, $text) {
		$this->ci->db->from($table);
		$this->ci->db->where("user_id", $this->ci->session->id);
		$this->ci->db->like($condition, $value);
		$data = $this->ci->db->get()->num_rows();
		$x = $text;
		if ($data != null) {
			return $x;
		}
	}

	// Span
	function get_span($value,$true,$false,$alternative) {		
		if ($value == 1) {
			$query = "<span class='badge badge-info'>".$true."</span>";
		} elseif ($value == 2) {
			$query = "<span class='badge badge-danger'>".$false."</span>";
		} elseif ($value == 3) {
			$query = "<span class='badge badge-warning'>".$alternative."</span>";
		}
		echo $query;
	}


	// Hitung Cepat
	function countLike1($table,$condition,$value){
		$this->ci->db->from($table);
		$this->ci->db->like($condition, $value);
		$data = $this->ci->db->get()->num_rows();
		return $data;
	}

	function hitung_rows($tabel,$kode,$id) {		
		$this->ci->db->where($kode,$id);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_multiple($tabel,$kode1,$id1,$kode2,$id2) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->like($kode2,$id2);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function hitung_rows_triple($tabel,$kode1,$id1,$kode2,$id2,$kode3,$id3) {		
		$this->ci->db->where($kode1,$id1);
		$this->ci->db->where($kode2,$id2);
		$this->ci->db->like($kode3,$id3);
		$query = $this->ci->db->get($tabel)->num_rows();
		return $query;
	}

	function sum($table, $field)
	{
		$this->ci->db->select_sum($field);
		$query = $this->ci->db->get($table)->row($field);
		return $query;
	}

	function sumOnCondition($table, $field,$condition,$value)
	{
		$this->ci->db->select_sum($field);
		$query = $this->ci->db->get($table)->row($field);
		return $query;
	}

	function print($konten,$filename,$data) {
		require_once 'vendor/autoload.php';		

		$mpdf = new \Mpdf\Mpdf([
			    'mode' => 'utf-8',
			    'format' => 'A4',
			    'orientation' => 'P',
			    'margin_left' => 0,
		    	'margin_right' => 0,
		    	'margin_top' => 0,
		    	'margin_bottom' => 0

			]
		);
		
		$content = $this->ci->load->view($konten,$data, true);
		// test($content);
		$mpdf->WriteHTML($content);
		$mpdf->Output($filename.".pdf","I");
	}


}

?>