<?php
/*Nama : Krisostomos Abdixta Winarto 
NIM : A11.2019.11695
Kelompok : A11.4402*/
class Stokbarang extends CI_Controller{
    public function panggil_barang(){
        $this->load->model('model_data');
        $data['barangku']=$this->model_data->baca_data();
        $this->load->view('tampil_barang',$data);
    }
    public function simpan(){
        $kode = $this->input->post('xkdbrg');
        $nmbrg = $this->input->post('xnmbrg');
        $hgbrg = $this->input->post('xhgbrg');
        $gambar = $_FILES['gambar'];
        if($gambar=''){
        }else{
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            $this->load->library('upload',$config);
            if( ! $this->upload->do_upload('gambar')){
                echo "gagal upload";
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        $data = array(
            'kode'=>$kode,
            'nama_barang'=>$nmbrg,
            'harga'=>$hgbrg,
            'gambar'=>$gambar
        );
        $this->load->model('model_data');
        $this->model_data->tambah_data($data,'baru');
        redirect('stokbarang/panggil_barang');
    }
    public function hapus($kode){
        $kunci = array('kode'=>$kode);
        $this->load->model('model_data');
        $this->model_data->hapus_data($kunci,'baru');
        redirect('stokbarang/panggil_barang');
    }
    public function edit($kode){
        $kunci = array('kode'=>$kode);
        $this->load->model('model_data');
        $data['barangku']=$this->model_data->edit_data($kunci,'baru')->result();
        $this->load->view('formUpdate',$data);        
    }
    public function update(){
        $kode = $this->input->post('xkdbrg');
        $nama = $this->input->post('xnmbrg');
        $harga = $this->input->post('xhgbrg');
        $gambar = $_FILES['gambar'];
        if($gambar != ''){
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('gambar'))
            {
                $image_name=$this->input->post('old');
            }else{
                $upload_data=$this->upload->data();
                $image_name=$upload_data['file_name'];
            }
        }
        $data=array(
            'kode'=>$kode,
            'nama_barang'=>$nama,
            'harga'=>$harga,
            'gambar'=>$image_name
        );
        $kunci=array('kode'=>$kode);
        $this->load->model('model_data');
        $this->model_data->update_data($kunci,$data,'baru');
        redirect('stokbarang/panggil_barang');

    }
}
?>