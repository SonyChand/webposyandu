<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function pengguna()
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Pengguna',
			'crumb' => 'Admin',
			'dataTab' => $this->db->get_where('pengguna', ['email !=' => $this->session->userdata('email')])->result()
		];

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!',
			'valid_email' => 'Gunakan <strong>{field}</strong> yang valid!',
			'is_unique' => '<strong>{field}</strong> "' . $this->input->post('email', true) . '" sudah terdaftar!'
		]);
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('role', 'Akses Pengguna', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('status', 'Status Akun', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/pengguna/index', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$dataUser = [
				'nama' => $this->input->post('nama', true),
				'email' => $this->input->post('email', true),
				'password' => password_hash($this->input->post('email', true), PASSWORD_DEFAULT),
				'image' => 'default',
				'role' => $this->input->post('role', true),
				'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'tgl_dibuat' => time(),
				'status' => $this->input->post('status', true)
			];

			$this->db->insert('pengguna', $dataUser);

			$this->session->set_flashdata('pengguna', '<div class="alert alert-success">Pengguna baru dengan email <strong>' . $this->input->post('email', true) . '</strong> berhasil ditambahkan!!</div>');
			redirect('admin/pengguna');
		}
	}


	public function ubahPengguna($id = '')
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Ubah Pengguna',
			'crumb' => 'Admin',
			'oneData' => $this->db->get_where('pengguna', ['id' => $id])->row(),
		];

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('role', 'Akses Pengguna', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('status', 'Status Akun', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/pengguna/ubah', $data);
			$this->load->view('templates/dash/footer');
		} else {

			$dataUser = [
				'nama' => $this->input->post('nama', true),
				'role' => $this->input->post('role', true),
				'no_hp' => str_replace(' ', '', str_replace('+', '', $this->input->post('no_hp', true))),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
				'status' => $this->input->post('status', true)
			];

			$this->db->where('id', $data['oneData']->id);
			$this->db->update('pengguna', $dataUser);


			$this->session->set_flashdata('pengguna', '<div class="alert alert-success">Pengguna dengan email <strong>' . $data['oneData']->email . '</strong> berhasil diubah!!</div>');
			redirect('admin/pengguna');
		}
	}

	public function hapusPengguna($id)
	{
		$pel = $this->db->get_where('pengguna', ['id' => $id])->row();

		$this->db->delete('pengguna', ['id' => $id]);

		$this->session->set_flashdata('pengguna', '<div class="alert alert-warning">Data Pengguna <strong>' . $pel['email'] . '</strong> berhasil dihapus!!</div>');
		redirect('admin/pengguna');
	}

	public function artikel()
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Artikel',
			'dataTab' => $this->db->join('kategori_artikel', 'artikel.kategori_id = kategori_artikel.id', 'left')->get('artikel')->result(),
		];

		$this->load->view('templates/dash/header', $data);
		$this->load->view('templates/dash/sidenav', $data);
		$this->load->view('admin/artikel/index', $data);
		$this->load->view('templates/dash/footer');
	}

	public function previewArtikel($slug)
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Preview Artikel',
			'oneData' => $this->db->select('artikel.*, kategori_artikel.kategori, pengguna.nama')->join('pengguna', 'artikel.user_id = pengguna.id', 'left')->join('kategori_artikel', 'artikel.kategori_id = kategori_artikel.id', 'left')->get_where('artikel', ['slug' => $slug])->row(),
		];

		$this->load->view('templates/dash/header', $data);
		$this->load->view('templates/dash/sidenav', $data);
		$this->load->view('admin/artikel/preview', $data);
		$this->load->view('templates/dash/footer');
	}

	public function tambahArtikel()
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Tambah Artikel',
			'dataKat' => $this->db->get('kategori_artikel')->result()
		];

		$this->form_validation->set_rules('title', 'Judul Artikel', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);
		$this->form_validation->set_rules('content', 'Konten Artikel', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);
		$this->form_validation->set_rules('kategori_id', 'Kategori Artikel', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);
		$this->form_validation->set_rules('status', 'Status Artikel', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/artikel/tambah', $data);
			$this->load->view('templates/dash/footer');
		} else {
			$image_blog = $_FILES['image']['name'];

			if ($image_blog) {

				$config['file_name'] = md5(sha1(time() . '-' . url_title($this->input->post('title'), 'dash', TRUE)));
				$config['encrypt_name'] = TRUE;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '5000';
				$config['upload_path'] = './assets/img/blog/';

				if (is_dir($config['upload_path']) != true) {
					mkdir($config['upload_path'], 0777, TRUE);
				}

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$img_blog = $this->upload->data('file_name');
				} else {
					$img_blog = 'default';
				}
			}

			$data = [
				'title' => $this->input->post('title', true),
				'slug' => url_title($this->input->post('title'), 'dash', TRUE),
				'image' => $img_blog,
				'content' => $this->input->post('content', true),
				'kategori_id' => $this->input->post('kategori_id', true),
				'user_id' => $data['user']->id,
				'date_created' => time(),
				'last_updated' => time(),
				'status' => $this->input->post('status', true)
			];

			$cek = $this->db->get_where('kategori_artikel', ['id' => $this->input->post('category_id', true)])->row();

			$this->db->insert('artikel', $data);

			$this->session->set_flashdata('artikel', '<div class="alert alert-success">Artikel <strong>' . $this->input->post('title', true) . '</strong> dengan kategori ' . $cek['category'] . ' berhasil ditambahkan!!</div>');
			redirect('admin/artikel');
		}
	}

	public function ubahArtikel($slug = '')
	{
		$data = [
			'user' => $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row(),
			'title' => 'Ubah Postingan - ' . $slug,
			'dataKat' => $this->db->get('kategori_artikel')->result(),
			'oneData' => $this->db->join('kategori_artikel', 'artikel.kategori_id = kategori_artikel.id', 'left')->get_where('artikel', ['slug' => $slug])->row()
		];

		$this->form_validation->set_rules('title', 'Judul Artikel', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);
		$this->form_validation->set_rules('content', 'Konten Artikel', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);
		$this->form_validation->set_rules('kategori_id', 'Kategori Artikel', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);
		$this->form_validation->set_rules('status', 'Status Artikel', 'required|trim', [
			'required' => '<strong>{field}</strong> tidak boleh kosong!!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/dash/header', $data);
			$this->load->view('templates/dash/sidenav', $data);
			$this->load->view('admin/artikel/ubah', $data);
			$this->load->view('templates/dash/footer');
		} else {
			$upload_image = $_FILES['image']['name'];
			$sluggish = $data['oneData']->slug;

			if ($upload_image) {
				$config['file_name'] = md5(sha1(time() . '-' . url_title($this->input->post('title'), 'dash', TRUE)));
				$config['encrypt_name'] = TRUE;
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']      = '5000';
				$config['upload_path'] = './assets/img/blog/';

				$this->load->library('upload', $config);
				$blabla = $this->db->get_where('artikel', ['slug' => $sluggish])->row();
				if ($this->upload->do_upload('image')) {
					$old_image = $blabla->image;
					if ($old_image != 'default') {
						unlink(FCPATH . 'assets/img/blog/' . $old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = [
				'title' => $this->input->post('title', true),
				'slug' => url_title($this->input->post('title'), 'dash', TRUE),
				'content' => $this->input->post('content', true),
				'kategori_id' => $this->input->post('kategori_id', true),
				'last_updated' => time(),
				'status' => $this->input->post('status', true)
			];
			$this->db->where('slug', $slug);
			$this->db->update('artikel', $data);


			$cek = $this->db->get_where('kategori_artikel', ['id' => $this->input->post('category_id', true)])->row();

			$this->session->set_flashdata('artikel', '<div class="alert alert-success">Artikel <strong>' . $this->input->post('title', true) . '</strong> dengan kategori ' . $cek->kategori . ' berhasil diubah!!</div>');
			redirect('admin/artikel');
		}
	}

	public function hapusArtikel($slug)
	{
		$pel = $this->db->get_where('artikel', ['slug' => $slug])->row();

		$this->db->delete('artikel', ['slug' => $pel->slug]);
		unlink(FCPATH . 'assets/img/blog/' . $pel->image);

		$cek = $this->db->get_where('kategori_artikel', ['id' => $pel->kategori_id])->row();

		$this->session->set_flashdata('artikel', '<div class="alert alert-success">Artikel <strong>' . $pel->title . '</strong> dengan kategori ' . $cek->kategori . ' berhasil dihapus!!</div>');
		redirect('admin/artikel');
	}
}
