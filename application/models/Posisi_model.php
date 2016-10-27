<?php 
class Posisi_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getPosisi()
    {	return $this->db->get('posisi')->result_array();
    }
    public function delPosisi($idPosisi='')
    {
    	//$this->db->where('id_pegawai', $idPegawai);
		//$this->db->delete('pegawai');
    	return 1;
    }
}
?>