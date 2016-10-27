<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct()
    {
    	parent::__construct();
        $this->load->helper('url');
        $this->load->model('pegawai_model'); 
        $this->load->model('kota_model');  
        $this->load->model('posisi_model');   
    }
	public function index()
	{	$this->load->helper('form');
		$data=[
			'pegawais' => $this->pegawai_model->getPegawai(),
		];
		$this->load->view('header');
		$this->load->view('pegawai_list', $data);
		$this->load->view('footer');
	}
	public function ajax()
	{
		$pegawais=$this->pegawai_model->getPegawaiByName($this->input->post('ygDicari'));		
		if(count($pegawais)>0) {
			foreach ($pegawais as $key => $value) { ?>
			<tr>     
			  <td><?php print_r($value['nama']) ?></td>
			  <td><?php print_r($value['gender']) ?></td>
			  <td><?php print_r($value['no_telp']) ?></td>
			  <td><?php print_r($value['kota']) ?></td>
			  <td><?php print_r($value['posisi']) ?></td>
			  <td><?php if ($value['status']==1) echo 'Tetap'; else echo 'Out Sourcing'; ?></td>
			  <td><a class="btn btn-sm btn-danger" href="<?php echo base_url('pegawai/del/'); echo $value['id_pegawai']; ?>">X</a>
			  <a class="btn btn-sm btn-warning" href="<?php echo base_url('pegawai/upd/'); echo $value['id_pegawai']; ?>"><i class="fa fa-pencil"></i> Ubah</a>
			  </td>
			</tr>
			<?php 
			}
	    }   
    	die();
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
			$data=[
				'kotas' =>  $this->kota_model->getKota(),
				'posisis' => $this->posisi_model->getPosisi(),
			];
			$this->load->view('header');
			$this->load->view('pegawai_add', $data);
			$this->load->view('footer');
		} else {	
			$this->pegawai_model->addPegawai($this->input->post());
			redirect('pegawai');	
		}
	}
	public function upd($idPegawai='')
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data=[
				'kotas' =>  $this->kota_model->getKota(),
				'posisis' => $this->posisi_model->getPosisi(),
				'pegawai'	=> $this->pegawai_model->getPegawaiById($idPegawai),
			];
			$this->load->view('header');
			$this->load->view('pegawai_upd', $data);
			$this->load->view('footer');
		} else {	
			$this->pegawai_model->updPegawai($this->input->post());
			redirect('pegawai');	
		}
	}
	public function delz()
	{
		$this->pegawai_model->delall();
	}
}
