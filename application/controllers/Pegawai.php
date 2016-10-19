<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct()
    {
    	parent::__construct();
        $this->load->helper('url');
        $this->load->model('pegawai_model');     
    }
	public function index()
	{	$data=[
			'pegawais' => $this->pegawai_model->getPegawai(),
		];
		$this->load->view('header');
		$this->load->view('pegawai_list', $data);
		$this->load->view('footer');
	}
	public function del($idPegawai='')
	{
		$this->pegawai_model->delPegawai($idPegawai);
		redirect('pegawai');
	}
	public function add()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('pegawai_add');
			$this->load->view('footer');
		} else {	
			$this->pegawai_model->addPegawai($this->input->post());
			redirect('pegawai');	
		}
		
	}
}
