<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$data = array(
			'title' => 'Web Hukum',
			'isi' => 'v_home',
			'kategori' => $this->db->get('tbl_kategori')->result(),
			'layanan' => $this->db->get('tbl_layanan')->result(),
			'durasi' => $this->db->get('tbl_durasi')->result(),
		);

		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);

		$this->form_validation->set_rules('durasi', 'durasi', 'trim|required', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);

		$this->form_validation->set_rules('jadwal', 'jadwal', 'trim|required', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);

		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required|numeric', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);

		$this->form_validation->set_rules('email', 'email', 'trim|required', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);

		$this->form_validation->set_rules('layanan', 'layanan', 'trim|required', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);

		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/v_wrapper', $data, FALSE);
		} else {
			$unik = rand(123, 999);

			$kategori = $this->db->get_where('tbl_kategori', array('id' => $this->input->post('kategori', true)))->row();
			$durasi = $this->db->get_where('tbl_durasi', array('id' => $this->input->post('durasi', true)))->row();
			$layanan = $this->db->get_where('tbl_layanan', array('id' => $this->input->post('layanan', true)))->row();
			$total_harga = $kategori->harga + $durasi->harga + $layanan->harga + $unik;

			// $new_price = $price + $unique_code;
			$dataForm = [
				'id_kategori' => $this->input->post('kategori', true),
				'id_durasi' => $this->input->post('durasi', true),
				'jadwal' => $this->input->post('jadwal', true),
				'no_hp' => $this->input->post('no_hp', true),
				'email' => $this->input->post('email', true),
				'id_layanan' => $this->input->post('layanan', true),
				'deskripsi' => $this->input->post('deskripsi', true),
				'biaya' => $total_harga,
				'status' => 0, // 0 = Pending, 1 = Process, 2 = Done, 3 = Cancel
				'created_at' => time(),
				'updated_at' => time(),
			];

			$this->db->insert('form_konsultasi', $dataForm);
			$teks = '*Form%20Konsultasi*%0A%0A*Kategori:* ' . $kategori->kategori . '%0A*Email:* %20' . $this->input->post('email', true) . '%0A*No%20Hp:* %20' . $this->input->post('no_hp', true) . '%0A*Biaya:* %20Rp.%20' . number_format($total_harga, 0, ',', '.') . '%0A*Lampirkan%20Bukti%20Pembayaran!!*';
			$this->session->set_userdata('pay', 'Pending');
			$this->session->set_userdata('email', $this->input->post('email', true));
			$this->session->set_userdata('biaya', $total_harga);
			$this->session->set_userdata('mulai', time());
			$this->session->set_userdata('teks', $teks);
			redirect('home/pembayaran');
		}
	}

	public function pembayaran()
	{
		if ($this->session->userdata('pay') == 'Pending') {
			$data = array(
				'title' => 'Web Hukum',
				'isi' => 'v_pay'
			);

			$this->load->view('layout/v_pay_wrapper', $data, FALSE);
		} else {
			redirect();
		}
	}

	public function get_harga()
	{
		$kategori = $this->input->post('kategori');
		$durasi = $this->input->post('durasi');
		$layanan = $this->input->post('layanan');

		$harga_kategori = $this->db->get_where('tbl_kategori', array('id' => $kategori))->row()->harga;
		$harga_durasi = $this->db->get_where('tbl_durasi', array('id' => $durasi))->row()->harga;
		$harga_layanan = $this->db->get_where('tbl_layanan', array('id' => $layanan))->row()->harga;

		$total_harga = $harga_kategori + $harga_durasi + $harga_layanan;

		echo $total_harga;
	}

	public function start_countdown()
	{
		$this->session->set_userdata('countdown_start', time());
	}
}

/*Home.php */
