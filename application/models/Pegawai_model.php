<?php 
class Pegawai_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getPegawai()
    {	$this->db->select('pegawai.id_pegawai, pegawai.nama, kelamin.nama AS gender, pegawai.no_telp, kota.nama AS kota, posisi.nama AS posisi, pegawai.status, ');
		$this->db->from('pegawai');
    	$this->db->join('kota', 'kota.id=pegawai.kota', 'left');
    	$this->db->join('posisi', 'posisi.id_posisi=pegawai.id_posisi', 'left');
    	$this->db->join('kelamin', 'kelamin.id=pegawai.kelamin', 'left');
    	$this->db->order_by('pegawai.nama', 'ASC');
    	$this->db->limit(10);
    	$pegawais=$this->db->get()->result_array(); 
    	return $pegawais;
    }
    public function delPegawai($idPegawai='')
    {
    	$this->db->where('id_pegawai', $idPegawai);
		$this->db->delete('pegawai');
    	return 1;
    }
}
?>