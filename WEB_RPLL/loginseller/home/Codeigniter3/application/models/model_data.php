<?php
/*Nama : Krisostomos Abdixta Winarto 
NIM : A11.2019.11695
Kelompok : A11.4402*/
class Model_data extends CI_Model{
    public function baca_data(){
        return $this->db->get('baru')->result_array();
    }
    public function tambah_data($tabel,$data){
        $this->db->insert($data,$tabel);
    }
    public function hapus_data($data,$tabel){
        $this->db->where($data);
        $this->db->delete($tabel);
    }
    public function edit_data($data,$tabel){
		return $this->db->get_where($tabel,$data);
	}
	public function update_data($kunci,$data,$table){
		$this->db->where($kunci);
		$this->db->update($table,$data);
	}	
    public function detail_data($kode){
        $query = $this->db->get_where('baru',array('kode'=>$kode))->row();
        return $query;
    }
}
?>