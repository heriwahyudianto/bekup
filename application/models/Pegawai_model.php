<?php 
class Pegawai_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getPegawai()
    {	$this->db->select('pegawai.id_pegawai, pegawai.nama, kelamin.nama AS gender, pegawai.no_telp, kota.nama AS kota, posisi.nama AS posisi, pegawai.status ');
		$this->db->from('pegawai');
    	$this->db->join('kota', 'kota.id=pegawai.kota', 'left');
    	$this->db->join('posisi', 'posisi.id_posisi=pegawai.id_posisi', 'left');
    	$this->db->join('kelamin', 'kelamin.id=pegawai.kelamin', 'left');
    	$this->db->order_by('pegawai.nama', 'ASC');
    	$this->db->limit(10);
    	$pegawais=$this->db->get()->result_array(); 
    	return $pegawais;
    }
    public function getPegawaiByName($ygDicari)
    {   $this->db->select('pegawai.id_pegawai, pegawai.nama, kelamin.nama AS gender, pegawai.no_telp, kota.nama AS kota, posisi.nama AS posisi, pegawai.status ');
        $this->db->from('pegawai');
        $this->db->join('kota', 'kota.id=pegawai.kota', 'left');
        $this->db->join('posisi', 'posisi.id_posisi=pegawai.id_posisi', 'left');
        $this->db->join('kelamin', 'kelamin.id=pegawai.kelamin', 'left');
        $this->db->like('pegawai.nama', $ygDicari, 'after');;
        $this->db->order_by('pegawai.nama', 'ASC');
        $this->db->limit(10);
        $pegawais=$this->db->get()->result_array(); 
        return $pegawais;
    }
    public function getPegawaiById($idPegawai)
    {   $this->db->where('id_pegawai', $idPegawai);  
        return $this->db->get('pegawai')->result_array()[0]; 
    }
    public function delPegawai($idPegawai='')
    {
    	$this->db->where('id_pegawai', $idPegawai);
		$this->db->delete('pegawai');
    	return 1;
    }
    public function addPegawai($postData)
    {   //random id_pegawai
        $this->db->select('COUNT(*) as JML');
        $jmlPegawai = $this->db->get('pegawai')->result_array()[0];       
        $data = [
            'id_pegawai' => sha1($jmlPegawai['JML']),
            'nama' => $postData['nama'],
            'no_telp' => $postData['no_telp'],
            'kota' => $postData['kota'],
            'kelamin' => $postData['kelamin'],
            'id_posisi' => $postData['id_posisi'],
            'status' => $postData['status'],
        ];
        $this->db->insert('pegawai', $data);
    }
     public function updPegawai($postData)
    {   //print_r($postData); die(); //Array ( [id_pegawai] => da4b9237bacccdf19c0760cab7aec4a8359010b0 [nama] => asd [kelamin] => 1 [no_telp] => 3434 [kota] => 2 [id_posisi] => 2 [status] => 0 [simpan] => Simpan ) 
        $data = [
            'nama' => $postData['nama'],
            'no_telp' => $postData['no_telp'],
            'kota' => $postData['kota'],
            'kelamin' => $postData['kelamin'],
            'id_posisi' => $postData['id_posisi'],
            'status' => $postData['status'],
        ];        
        $this->db->where('id_pegawai', $postData['id_pegawai']);    
        $this->db->update('pegawai', $data);
    }
    public function delall()
    {
        $this->db->delete('pegawai', array('id_pegawai' => ''));  // Produces: // DELETE FROM mytable  // WHERE id = $id
    }
}
?>