<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Kegiatan_model");
		$this->load->model("User_model");
	}

	function index()
	{
		$data['user'] = $this->User_model->get();

		$this->load->view("kegiatan/vw_kegiatan", $data);
	}

	function tambah()
	{
		$data['user'] = $this->User_model->get();
		$this->form_validation->set_rules('kegiatan', 'Nama Kegiatan', 'required', array('required' => 'Nama Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_unit', 'Nama Unit Pengaju Kegiatan', 'required', array('required' => 'Nama Unit Pengaju Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_peserta', 'Darimana Peserta Kegiatan', 'required', array('required' => 'Darimana Peserta Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('kegiatan_jmlpeserta', 'Jumlah Peserta Kegiatan', 'required', array('required' => 'Jumlah Peserta Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'required', array('required' => 'Prioritas Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('prioritas_alasan', 'Alasan Prioritas', 'required', array('required' => 'Alasan Prioritas Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required', array('required' => 'Penanggung Jawab Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('waktu', 'Waktu', 'required', array('required' => 'Waktu Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array('required' => 'Lokasi Kegiatan Wajib Di Isi'));
		// $this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|numeric', array('required' => 'No HP Mahasiswa Wajib Di Isi', 'numeric' => 'No HP Harus Angka'));
		$this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required', array('required' => 'Pelaksana Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('skema', 'Skema', 'required', array('required' => 'Skema Kegiatan Wajib Di Isi'));
		$this->form_validation->set_rules('status', 'Status', 'required', array('required' => 'Status Kegiatan Wajib Di Isi'));
		if ($this->form_validation->run() == false) {
			// $this->load->view("layout/header", $data);
			// $this->load->view("kegiatan/form_tambah",$data);
			$this->load->view("kegiatan/form_tambah", $data);
			// $this->load->view("layout/footer");
		} else {
			$lokasi = "";
			if ($this->input->post('lokasiIn') == NULL) {
				$lokasi = $this->input->post('lokasiOut');
			} else {
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
				'lokasi' => $lokasi,
				'pelaksana' => $this->input->post('pelaksana'),
				'skema' => $this->input->post('skema'),
				'Status' => $this->input->post('status'),
			];
			$this->Kegiatan_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kegiatan Berhasil Ditambah!</div>');
			redirect('Kegiatan');
			// print_r($data); die;
		}
	}
}
