<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->cek_sesi();
		$this->load->model("Kegiatan_model");
		$this->load->model("Komentar_model");
		$this->load->model("User_model");
		$this->load->model("Lokasi_model");
		//$this->load->library('form_validation');
	}

	function index()
	{
		$data['kegiatan'] = $this->Kegiatan_model->get();
		$data['judul'] = "Halaman List";
		$this->load->view("layout/header", $data);
		$this->load->view("kegiatan/vw_kegiatan", $data);
		$this->load->view("layout/footer", $data);
	}

	function cek_sesi()
	{
		if ($this->session->userdata('email') == null) {
			echo "<script>alert('Silahkan Login Terlebih Dahulu'); document.location.href = '" . base_url('login') . "'</script>";
		}
	}

	function tambah()
	{


		// $data['judul'] = "Halaman Tambah Mahasiswa";
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['user'] = $this->User_model->get();

		$data['listUser'] = $this->User_model->getStaff();
		$data['judul'] = "Halaman Tambah Kegiatan";
		if ($this->input->post('tempatIn') || $this->input->post('tempatOut')) {
			
		} else {
			$this->form_validation->set_rules('lokasiOut', 'Lokasi Indoor Kegiatan', 'required', array('required' => 'Wajib memilih lokasi'));
		}


		$this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required', array('required' => 'Nama Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_unit', 'Nama Unit Pengaju Kegiatan', 'required', array('required' => 'Nama Unit Pengaju Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_peserta', 'Darimana Peserta Kegiatan', 'required', array('required' => 'Darimana Peserta Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_jmlpeserta', 'Jumlah Peserta Kegiatan', 'required', array('required' => 'Jumlah Peserta Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'required', array('required' => 'Prioritas Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('prioritas_alasan', 'Alasan Prioritas', 'required', array('required' => 'Alasan Prioritas Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required', array('required' => 'Penanggung Jawab Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('acara_mulai', 'acara_mulai', 'required', array('required' => 'Awal Acara Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('acara_akhir', 'acara_akhir', 'required', array('required' => 'Akhir Acara Kegiatan Wajib Di Isi'));
		//$this->form_validation->set_rules('tempat', 'Tempat', 'required', array('required' => 'Tempat Kegiatan Wajib Di Isi'));

		// $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|numeric', array('required' => 'No HP Mahasiswa Wajib Di Isi', 'numeric' => 'No HP Harus Angka'));
		$this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required', array('required' => 'Pelaksana Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('skema_proses_masuk_keluar', 'Skema Proses Peserta Masuk Dan Keluar Kampus', 'required', array('required' => 'Skema Proses Peserta Masuk Dan Keluar Kampus Wajib Di Isi'));
		$this->form_validation->set_rules('skema_penerapan_prokes', 'Skema Penerapan Proses Ke Peserta', 'required', array('required' => 'Skema Penerapan Prokes Ke Peserta Wajib Di Isi'));
		$this->form_validation->set_rules('skema_kegiatan_berlangsung', 'Skema Selama Kegiatan Berlangsung', 'required', array('required' => 'Skema Selama Kegiatan Berlangsung Wajib Di Isi'));
		$this->form_validation->set_rules('skema_kegiatan_selesai', 'Skema Setelah Kegiatan Selesai', 'required', array('required' => 'Skema Setelah Kegiatan Selesai Wajib Di Isi'));
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			// $this->load->view("kegiatan/form_tambah",$data);
			$this->load->view("kegiatan/form_tambah_test", $data);
			$this->load->view("layout/footer");
		} else {
			$skema_proses_masuk_keluar = $_POST['skema_proses_masuk_keluar'];
			$skema_penerapan_prokes = $_POST['skema_penerapan_prokes'];
			$skema_kegiatan_berlangsung = $_POST['skema_kegiatan_berlangsung'];
			$skema_kegiatan_selesai = $_POST['skema_kegiatan_selesai'];
			
			$data = [
				'kegiatan' => $this->input->post('kegiatan'),
				'kegiatan_unit' => $this->input->post('kegiatan_unit'),
				'kegiatan_peserta' => $this->input->post('kegiatan_peserta'),
				'kegiatan_jmlpeserta' => $this->input->post('kegiatan_jmlpeserta'),
				'prioritas' => $this->input->post('prioritas'),
				'prioritas_alasan' => $this->input->post('prioritas_alasan'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'acara_mulai' => $this->input->post('acara_mulai'),
				'acara_akhir' => $this->input->post('acara_akhir'),
				'pelaksana' => $this->input->post('pelaksana'),
				'skema_proses_masuk_keluar' => $skema_proses_masuk_keluar,
				'skema_penerapan_prokes' => $skema_penerapan_prokes,
				'skema_kegiatan_berlangsung' => $skema_kegiatan_berlangsung,
				'skema_kegiatan_selesai' => $skema_kegiatan_selesai,
				// 'skema_proses_masuk_keluar' => $this->input->post('skema_proses_masuk_keluar'),
				// 'skema_penerapan_prokes' => $this->input->post('skema_penerapan_prokes'),
				// 'skema_kegiatan_berlangsung' => $this->input->post('skema_kegiatan_berlangsung'),
				// 'skema_kegiatan_selesai' => $this->input->post('skema_kegiatan_selesai'),
				'satgas' => $this->input->post('satgas'),
				'kasatgas' => $this->input->post('kasatgas'),
				'pengaju' => $this->input->post('pengaju')
			];
			$id = $this->Kegiatan_model->insert($data);
			// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kegiatan Berhasil Ditambah!</div>');
			$lokasiIn = $this->input->post('lokasiIn');
			$lokasiOut = $this->input->post('lokasiOut');

			foreach($lokasiIn as $in):
				if($in == NULL){
					#Kosongkan
				}else{
					$data = [
						'id_kegiatan' =>$id,
						'tempat'=> 'Indoor',
						'lokasi'=>$in 
					];
					$this->Lokasi_model->insert($data);
				}
			endforeach;
			
			foreach($lokasiOut as $out):
				if($out == NULL){
					#Kosongkan
				}else{
					$data = [
						'id_kegiatan' =>$id,
						'tempat'=> 'Outdoor',
						'lokasi'=>$out 
					];
					$this->Lokasi_model->insert($data);
				}
			endforeach;
			print_r($lokasiOut);
			 if($lokasiOut[0] == NULL)
			 {
				$data = [
					'id_kegiatan' =>$id,
					'tempat'=> 'kosong',
					'lokasi'=> 'kosong' 
				];
				$this->Lokasi_model->insert($data);	
			 }
			redirect('detail/komentar/' . $id);

			// $data['user'] = $this->User_model->get_by_id('1'); //ambil dari session
			// $data['nama_user'] = $this->User_model->get(); 
			// $data['komentar'] = $this->Komentar_model->get_by_id($id); //ambil dari parameter 
			// $data['kegiatan'] = $this->Kegiatan_model->get_by_id($id); //disini parameter id kegiatan untuk mengambil datanya
			// $this->load->view('layout/header');
			// $this->load->view('detail/index', $data);
			// $this->load->view('layout/footer');
			// print_r($data); die;
		}
	}

	function edit($id = "")
	{
		// $data['judul'] = "Halaman Tambah Mahasiswa";
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['user'] = $this->User_model->get();

		$data['listUser'] = $this->User_model->getStaff();
		$data['kegiatan'] = $this->Kegiatan_model->get_by_id($id);
		$data['lokasi'] = $this->Lokasi_model->get_by_id($id);
		// print_r($data['kegiatan']);die;
		if (empty($data['kegiatan'])) {
			echo "<script>alert('Data Kegiatan tidak ditemukan'); document.location.href = '" . base_url('kegiatan') . "'</script>";
		}

		if ($data['kegiatan']['satgas'] == "Dibatalkan") {
			echo "<script>alert('Kegiatan ini telah dibatalkan'); document.location.href = '" . base_url('kegiatan') . "'</script>";
		}

		if ($this->session->userdata('email') == $data['kegiatan']['pengaju']) {
		} else {
			echo "<script>alert('Tidak dapat mengakses detail yang bukan anda ajukan'); document.location.href = '" . base_url('kegiatan') . "'</script>";
		}

		$data['judul'] = "Halaman Edit Kegiatan";
		
		$this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required', array('required' => 'Nama Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_unit', 'Nama Unit Pengaju Kegiatan', 'required', array('required' => 'Nama Unit Pengaju Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_peserta', 'Darimana Peserta Kegiatan', 'required', array('required' => 'Darimana Peserta Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_jmlpeserta', 'Jumlah Peserta Kegiatan', 'required', array('required' => 'Jumlah Peserta Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'required', array('required' => 'Prioritas Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('prioritas_alasan', 'Alasan Prioritas', 'required', array('required' => 'Alasan Prioritas Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required', array('required' => 'Penanggung Jawab Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('acara_mulai', 'acara mulai', 'required', array('required' => 'acara mulai Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('acara_akhir', 'acara Akhir', 'required', array('required' => 'acara Akhir Kegiatan Wajib Di Isi'));
		
		// $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|numeric', array('required' => 'No HP Mahasiswa Wajib Di Isi', 'numeric' => 'No HP Harus Angka'));
		$this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required', array('required' => 'Pelaksana Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('skema_proses_masuk_keluar', 'Skema Proses Peserta Masuk Dan Keluar Kampus', 'required', array('required' => 'Skema Proses Peserta Masuk Dan Keluar Kampus Wajib Di Isi'));
		$this->form_validation->set_rules('skema_penerapan_prokes', 'Skema Penerapan Proses Ke Peserta', 'required', array('required' => 'Skema Penerapan Prokes Ke Peserta Wajib Di Isi'));
		$this->form_validation->set_rules('skema_kegiatan_berlangsung', 'Skema Selama Kegiatan Berlangsung', 'required', array('required' => 'Skema Selama Kegiatan Berlangsung Wajib Di Isi'));
		$this->form_validation->set_rules('skema_kegiatan_selesai', 'Skema Setelah Kegiatan Selesai', 'required', array('required' => 'Skema Setelah Kegiatan Selesai Wajib Di Isi'));
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			// $this->load->view("kegiatan/form_tambah",$data);
			$this->load->view("kegiatan/form_edit_test", $data);
			$this->load->view("layout/footer");
		} else {
			$lokasiIn = $this->input->post('lokasiIn');
			$lokasiOut = $this->input->post('lokasiOut');
			
			$lokasi = "";
			$tempat = $this->input->post('tempat');
			$skema_proses_masuk_keluar = $_POST['skema_proses_masuk_keluar'];
			$skema_penerapan_prokes = $_POST['skema_penerapan_prokes'];
			$skema_kegiatan_berlangsung = $_POST['skema_kegiatan_berlangsung'];
			$skema_kegiatan_selesai = $_POST['skema_kegiatan_selesai'];
			
			$data = [
				'kegiatan' => $this->input->post('kegiatan'),
				'kegiatan_unit' => $this->input->post('kegiatan_unit'),
				'kegiatan_peserta' => $this->input->post('kegiatan_peserta'),
				'kegiatan_jmlpeserta' => $this->input->post('kegiatan_jmlpeserta'),
				'prioritas' => $this->input->post('prioritas'),
				'prioritas_alasan' => $this->input->post('prioritas_alasan'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'acara_mulai' => $this->input->post('acara_mulai'),
				'acara_akhir' => $this->input->post('acara_akhir'),
				'pelaksana' => $this->input->post('pelaksana'),
				'skema_proses_masuk_keluar' => $skema_proses_masuk_keluar,
				'skema_penerapan_prokes' => $skema_penerapan_prokes,
				'skema_kegiatan_berlangsung' => $skema_kegiatan_berlangsung,
				'skema_kegiatan_selesai' => $skema_kegiatan_selesai,
				'satgas' => $this->input->post('satgas'),
				'kasatgas' => $this->input->post('kasatgas'),
				'pengaju' => $this->input->post('pengaju')
			];
			$id = $this->input->post('id');
			//Mengupdate DB Kegiatan
			$this->Kegiatan_model->update(['id' => $id], $data);

			//Mengupdate pada lokasi
			foreach($lokasiIn as $key =>$t){
				if($t == NULL){
					#Kosongkan
				}else
				if($this->Lokasi_model->cek_data($key)>0)
				{
					$data = ['tempat'=>'Indoor', 'lokasi'=>$t];
					$this->Lokasi_model->update($data, $key);
					print_r($data);
				}else{
					$data = [
						'id_kegiatan' =>$id,
						'tempat'=> 'Indoor',
						'lokasi'=>$t 
					];
					$this->Lokasi_model->insert($data);
					print_r($data);
				}
			}

			foreach($lokasiOut as $key =>$t){
				if($t == NULL){
					#Kosongkan
				}else
				if($this->Lokasi_model->cek_data($key)>0)
				{
					$data = ['tempat'=>'Outdoor', 'lokasi'=>$t];
					$this->Lokasi_model->update($data, $key);
					print_r($data);
				}else{
					$data = [
						'id_kegiatan' =>$id,
						'tempat'=> 'Outdoor',
						'lokasi'=>$t 
					];
					$this->Lokasi_model->insert($data);
					print_r($data);
				}
			}


			redirect('detail/komentar/' . $id);
		}
	}

	public function batal($id = "")
	{
		$data = $this->Kegiatan_model->get_by_id($id);
		if (empty($data)) {
			echo "<script>alert('Data Kegiatan tidak ditemukan'); document.location.href = '" . base_url('kegiatan') . "'</script>";
		}
		if ($this->session->userdata('email') == $data['pengaju']) {
			$data = ['satgas' => 'Dibatalkan', 'kasatgas' => 'Dibatalkan'];
		} else {
			echo "<script>alert('Anda tidak bisa membatalkan yang bukan anda ajukan'); document.location.href = '" . base_url('kegiatan') . "'</script>";
		}
		// print_r('test'); die;
		$this->Kegiatan_model->gantiStatus($id, $data);
		redirect('kegiatan/');
	}
}
