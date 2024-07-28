<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Advokat extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_advokat');
	}
	

	public function index()
	{
		$data = array(
			'title' => 'Fra & Co. Law Firm',
			'title2' => 'Data Advokat',
			'advokat' => $this->m_advokat->lists(),
 			'isi' => 'admin/advokat/v_list'
		);
			$this->load->view('admin/layout/v_wrapper',$data,FALSE);
		}

	public function add()
	{
		$this->form_validation->set_rules('nama_advokat', 'Nama Advokat', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');

		
		if ($this->form_validation->run() == TRUE) {
			$config['uploads_path'] 			= './foto_advokat/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('foto_advokat'))
				{
					$data = array(
						'title' => 'Fra & Co. Law Firm',
						'title2' => 'Add Data Advokat',
						'error' => $this->upload->display_errors(),
						 'isi' => 'admin/advokat/v_add'
					);
						$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data 			= array('uploads' => $this->upload->data());
					$config['image_library']= 'gd2';
					$config['source_image']= './foto_advokat'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
									'nama_advokat' 	=> $this->input->post('nama_advokat'),
									'pendidikan' 	=> $this->input->post('pendidikan'),
									'jabatan' 		=> $this->input->post('jabatan'),
									'Foto_advokat' 	=> $upload_data['uploads']['file_name']
					);
					$this->m_advokat->add($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan');
					redirect('advokat');
					
					
				}
		} 
		$data = array(
			'title' => 'Fra & Co. Law Firm',
			'title2' => 'Add Data Advokat',
			 'isi' => 'admin/advokat/v_add'
		);
			$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

}

