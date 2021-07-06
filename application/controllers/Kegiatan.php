<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Kegiatan_model");
		$this->load->model("Komentar_model");
		$this->load->model("User_model");
		//$this->load->library('form_validation');
	}

	function index()
	{
		$data['user'] = $this->session->userdata('user');
		$data['kegiatan'] = $this->Kegiatan_model->get();
		$this->load->view("layout/header", $data);
		$this->load->view("kegiatan/vw_kegiatan", $data);
		$this->load->view("layout/footer", $data);
	}

	function tambah()
	{
		// $data['judul'] = "Halaman Tambah Mahasiswa";
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['user'] = $this->User_model->get();

		$data['listUser'] = $this->User_model->getStaff();
		$data['user'] = $this->User_model->get_by_id('2');
		$data['judul'] = "Halaman Tambah Kegiatan";
		if($this->input->post('lokasiIn')==NULL){
			$this->form_validation->set_rules('lokasiOut', 'Lokasi Out', 'required', array('required' => 'Lokasi Kegiatan Wajib Di Isi'));
		}else{
			$this->form_validation->set_rules('lokasiIn', 'Lokasi In', 'required', array('required' => 'Lokasi Kegiatan Wajib Di Isi'));
		}
		$this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required', array('required' => 'Nama Kegiatan Wajib Di Isi'));
        $this->form_validation->set_rules('kegiatan_unit', 'Nama Unit Pengaju Kegiatan', 'required', array('required' => 'Nama Unit Pengaju Kegiatan Wajib Di Isi'));
        $this->form_validation->set_rules('kegiatan_peserta', 'Darimana Peserta Kegiatan', 'required', array('required' => 'Darimana Peserta Kegiatan Wajib Di Isi'));
        $this->form_validation->set_rules('kegiatan_jmlpeserta', 'Jumlah Peserta Kegiatan', 'required', array('required' => 'Jumlah Peserta Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'required', array('required' => 'Prioritas Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('prioritas_alasan', 'Alasan Prioritas', 'required', array('required' => 'Alasan Prioritas Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required', array('required' => 'Penanggung Jawab Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('waktu', 'Waktu', 'required', array('required' => 'Waktu Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('tempat', 'Tempat', 'required', array('required' => 'Tempat Kegiatan Wajib Di Isi'));
		
		// $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|numeric', array('required' => 'No HP Mahasiswa Wajib Di Isi', 'numeric' => 'No HP Harus Angka'));
		$this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required', array('required' => 'Pelaksana Kegiatan Wajib Di Isi'));
        $this->form_validation->set_rules('skema_proses_masuk_keluar', 'Skema Proses Peserta Masuk Dan Keluar Kampus', 'required', array('required' => 'Skema Proses Peserta Masuk Dan Keluar Kampus Wajib Di Isi'));
		$this->form_validation->set_rules('skema_penerapan_prokes', 'Skema Penerapan Proses Ke Peserta', 'required', array('required' => 'Skema Penerapan Prokes Ke Peserta Wajib Di Isi'));
		$this->form_validation->set_rules('skema_kegiatan_berlangsung', 'Skema Selama Kegiatan Berlangsung', 'required', array('required' => 'Skema Selama Kegiatan Berlangsung Wajib Di Isi'));
		$this->form_validation->set_rules('skema_kegiatan_selesai', 'Skema Setelah Kegiatan Selesai', 'required', array('required' => 'Skema Setelah Kegiatan Selesai Wajib Di Isi'));
        $this->form_validation->set_rules('status', 'Status', 'required', array('required' => 'Status Kegiatan Wajib Di Isi'));
		if ($this->form_validation->run() == false) {
			$this->load->view("layout/header", $data);
			// $this->load->view("kegiatan/form_tambah",$data);
            $this->load->view("kegiatan/form_tambah", $data);
			$this->load->view("layout/footer");
		} else {
			$lokasi = "";
			$tempat = $this->input->post('tempat');
			$skema_proses_masuk_keluar = $_POST['skema_proses_masuk_keluar'];
			$skema_penerapan_prokes = $_POST['skema_penerapan_prokes'];
			$skema_kegiatan_berlangsung = $_POST['skema_kegiatan_berlangsung'];
			$skema_kegiatan_selesai = $_POST['skema_kegiatan_selesai'];
			if($this->input->post('lokasiIn')==NULL){
				$lokasi = $this->input->post('lokasiOut');
			}else{
				$lokasi = $this->input->post('lokasiIn');
			}
			$data = [
				'kegiatan' => $this->input->post('kegiatan'),
				'kegiatan_unit' => $this->input->post('kegiatan_unit'),
				'kegiatan_peserta' => $this->input->post('kegiatan_peserta'),
				'kegiatan_jmlpeserta' => $this->input->post('kegiatan_jmlpeserta'),
				'prioritas' => $this->input->post('prioritas'),
				'prioritas_alasan' => $this->input->post('prioritas_alasan'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'waktu' => $this->input->post('waktu'),
				'tempat' => $tempat,
                'lokasi' => $lokasi,
                'pelaksana' => $this->input->post('pelaksana'),
                'skema_proses_masuk_keluar' => $skema_proses_masuk_keluar,
				'skema_penerapan_prokes' => $skema_penerapan_prokes,
				'skema_kegiatan_berlangsung' => $skema_kegiatan_berlangsung,
				'skema_kegiatan_selesai' => $skema_kegiatan_selesai,
				// 'skema_proses_masuk_keluar' => $this->input->post('skema_proses_masuk_keluar'),
				// 'skema_penerapan_prokes' => $this->input->post('skema_penerapan_prokes'),
				// 'skema_kegiatan_berlangsung' => $this->input->post('skema_kegiatan_berlangsung'),
				// 'skema_kegiatan_selesai' => $this->input->post('skema_kegiatan_selesai'),
                'status' => $this->input->post('status'),
				'pengaju' => $this->input->post('pengaju')
			];
			$id = $this->Kegiatan_model->insert($data);
			// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kegiatan Berhasil Ditambah!</div>');
			redirect('detail/komentar/'.$id);

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
}
