<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->cek_sesi();
		$this->load->model('User_Model');
		$this->load->model('Kegiatan_Model');
		$this->load->model('Komentar_Model');
		date_default_timezone_set("Asia/Jakarta"); //Mengatur Zona waktu Jadi Indonesia
	}

	function cek_sesi()
	{
		if($this->session->userdata('email') == null){
			echo "<script>alert('Silahkan Login Terlebih Dahulu'); document.location.href = '" . base_url('login')."'</script>";
		}
	}

	public function index()
	{
		$data['judul'] = "Halaman List";
		// print_r($this->session->userdata()); die;
		$data['kegiatan'] = $this->Kegiatan_Model->get();
		$this->load->view("layout/header", $data);
		$this->load->view("kegiatan/vw_kegiatan", $data);
		$this->load->view("layout/footer", $data);
	}

	public function komentar($kegiatan = '1')
	{
		$data['komentar'] = $this->Komentar_Model->get_by_id($kegiatan); //ambil dari parameter 
		$data['kegiatan'] = $this->Kegiatan_Model->get_by_id($kegiatan); //disini parameter id kegiatan untuk mengambil datanya
		if(empty($data['kegiatan'])){
			echo "<script>alert('Data Kegiatan tidak ditemukan'); document.location.href = '" . base_url('kegiatan')."'</script>";
		}
		$data['judul'] = "Halaman Detail ".$data['kegiatan']['kegiatan'];
		// print_r($data['komentar']); die;
		
		// print_r($data['user']['role']); die;
		if(($this->session->userdata('role') ==1) || ($this->session->userdata('role') ==5) || ($this->session->userdata('email')==$data['kegiatan']['pengaju'])){
			
		}else{
			echo "<script>alert('Tidak dapat mengakses detail yang bukan anda ajukan'); document.location.href = '" . base_url('kegiatan')."'</script>";
		}
		// if($data['kegiatan'][''])
		$this->form_validation->set_rules('komentar', 'Komentar', 'required', [
			'required' => 'Komentar Tidak Boleh Kosong'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('detail/index', $data);
			$this->load->view('layout/footer');
		} else {
			if ($data['kegiatan']['status'] == 1) {
				echo "<script> alert('mau nge hack yaaa'); document.location.href = '" . base_url() . "';</script>";
			} else {
				$input = [
					'user' => $this->input->post('user'),
					'kegiatan' => $this->input->post('kegiatan'),
					'komentar' => htmlspecialchars($this->input->post('komentar', true)),
					'tanggal' => $this->input->post('tanggal')
				];
				// print_r($input);
				$this->Komentar_Model->insert($input);
				// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jurusan Berhasil Ditambah!</div>');
				redirect('Detail/komentar/' . $input['kegiatan']);
			}
		}
	}

	public function approve($id)
	{
		// print_r($user);die;
		if($this->session->userdata('role') == 1)
		{
			$where = 'satgas';
		}else if($this->session->userdata('role') == 5)
		{
			$where = ['satgas'=>$this->session->userdata('email'), 'kasatgas'=>$this->session->userdata('email'),];
		}else{
			echo "<script> alert('UnAuthorized'); document.location.href = '" . base_url() . "';</script>";
		}
		$this->Kegiatan_Model->gantiStatus($id , $where);
		redirect('kegiatan/');
	}

	public function LihatDetail($id)
	{
		$data['user'] = $this->User_Model->get_by_id($this->session->userdata('id'));
		$data['kegiatan'] = $this->Kegiatan_Model->get_by_id($id);

		$this->load->view('layout/header');
		$this->load->view('detail/detail', $data);
		$this->load->view('layout/footer');
	}

	public function cetak($id)
	{
		// $this->load->model('User_Model');
		// $this->load->model('Kegiatan_Model');
		// $this->load->model('Komentar_Model');
		$data['komentar'] = $this->Komentar_Model->get_by_id($id);
		$data['user'] = $this->session->userdata('user');
		$data['kegiatan'] = $this->Kegiatan_Model->get_by_id($id);
		// $data['komentar'] = $this->Komentar_model->get_by_id();
		$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML('<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			padding: 5px;
			text-align: left;
		}
		table {
			width: 100%;
		}
		td {
			height: 100px;
			padding: 10px;
		}
		td {
			width: 30%;
		}
	</style>');
		$mpdf->WriteHTML('<h2 style="text-align: center;">SURAT REKOMENDASI SATGAS COVID PCR UNTUK KEGIATAN TERENCANA</h2>');
		$mpdf->WriteHTML('<table border="1px solid black" aria-colspan="2">');
		$mpdf->WriteHTML('<tr>
		<td colspan="2"><b>KEGIATAN</b></td>
		<td colspan="3"> 
		<p><b>Nama Kegiatan</b></p>
		<p>' . $data['kegiatan']['kegiatan'] . '</p>
		<p><b>Unit Yang Mengajukan Kegiatan</b></p>
		<p>' . $data['kegiatan']['kegiatan_unit'] . '</p>
		<p><b>Peserta Kegiatan Darimana</b></p>
		<p>' . $data['kegiatan']['kegiatan_peserta'] . '</p>
		<p><b>Jumlah Peserta Yang Mengikuti Kegiatan</b></p>
		<p>' . $data['kegiatan']['kegiatan_jmlpeserta'] . '</p>
		</td>
		
	</tr>');

		$mpdf->WriteHTML('<tr >
		<td colspan="2"><b>PRIORITAS</b></td>
		<td colspan="3">
		<p><b>Tingkat Prioritas</b></p>
		<p>' . $data['kegiatan']['prioritas'] . '</p>
		<p><b>Alasan Prioritas</b></p>
		<p>' . $data['kegiatan']['prioritas_alasan'] . '</p>
		</td>
	</tr>');
		$mpdf->WriteHTML('<tr >
		<td colspan="2"><b>PENANGGUNG JAWAB</b></td>
		<td colspan="3">' . $data['kegiatan']['penanggung_jawab'] . '</td>
	</tr>');
	
		$timestamp = strtotime($data['kegiatan']['waktu']);
		$day = date('l', $timestamp);;
		if($day == 'Monday'){
			$day = 'Senin';
		}else if($day == 'Tuesday'){
			$day = 'Selasa';
		}else if($day == 'Wednesday'){
			$day = 'Rabu';
		}else if($day == 'Thursday'){
			$day = 'Kamis';
		}else if($day == 'Friday'){
			$day = 'Jumat';
		}else if($day == 'Saturday'){
			$day = 'Sabtu';
		}else if($day == 'Sunday'){
			$day = 'Minggu';
		}
		$mpdf->WriteHTML('<tr >
		<td colspan="2"><b>WAKTU / TEMPAT / LOKASI</b></td>
		<td colspan="3">
		<p><b>Waktu</b></p>
		<p>' .$day.' , '. $data['kegiatan']['waktu'] . '</p>
		<p><b>Lokasi / Tempat</b></p>
		<p>' . $data['kegiatan']['tempat'] . '</p>
		<p>' . $data['kegiatan']['lokasi'] . '</p>
		</td>
	</tr>');
		$mpdf->WriteHTML('<tr >
		<td colspan="2"><b>SKEMA KEGIATAN TERHADAP PROKES</b></td>
		<td colspan="3">
		<p><b>Proses Peserta Masuk Dan Keluar Kampus</b></p>
		<p>' . $data['kegiatan']['skema_proses_masuk_keluar'] . '</p>
		<p><b>Penerapan Proses Ke Peserta</b></p>
		<p>' . $data['kegiatan']['skema_penerapan_prokes'] . '</p>
		<p><b>Skema Selama Kegiatan Berlangsung</b></p>
		<p>' . $data['kegiatan']['skema_kegiatan_berlangsung'] . '</p>
		<p><b>Skema Setelah Kegiatan Selesai</b></p>
		<p>' . $data['kegiatan']['skema_kegiatan_selesai'] . '</p>
		</td>
	</tr>');
		$mpdf->WriteHTML('<tr colspan="4">
		<td colspan="2"><b>CATATAN SATGAS</b></td>
		<td colspan="3">');
		foreach($data['komentar'] as $k) : 
			$mpdf->WriteHTML('<p><b>'.$k['user'].'</b> : '.$k['komentar'].'</p>'); 
		endforeach; 
		$mpdf->WriteHTML('
		</td>
		</tr>');
		$mpdf->WriteHTML('<tr colspan="4">
		<td colspan="3"><p><b>PENGUSUL</b></p> <br>' .  $data['kegiatan']['pengaju'] . '</td>
		<td colspan="1"><p><b>SATGAS COVID</b></p> <br>'.$data['kegiatan']['satgas'].'</td>
		<td colspan="1"><p><b>KETUA SATGAS COVID</b></p> <br>'.$data['kegiatan']['kasatgas'].'</td>
	</tr>');
		$mpdf->WriteHTML('</table>');
		$mpdf->Output(''.$data['kegiatan']['kegiatan'].'.pdf', 'D');
	}
}
