<?php
/*Nama : Krisostomos Abdixta Winarto 
NIM : A11.2019.11695
Kelompok : A11.4402*/
class Control2 extends CI_Controller{

    public function tampil(){
        $this->load->model('model_data');
        $data['barangku']=$this->model_data->baca_data();
        $this->load->view('Card',$data);
    }
    public function view2($kode){
        $this->load->model('model_data');
        $detail 		= $this->model_data->detail_data($kode);
		$data['detail'] = $detail;

		$this->load->view('detail', $data);
    }
}
?>