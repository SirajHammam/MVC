<?php

class About extends Controller{
    public function page(){
        // echo "About/page";
        $data['judul']='page';
        $this->view('template/header',$data);
        $this->view('about/page');
        $this->view('template/footer');
    }
    public function index($nama='RajStore', $pekerjaan='Mahasiswa', $umur='17'){
        // echo "Halo, Nama saya $nama, saya $pekerjan unida gontor, umur saya $umur tahun";
        $data['nama']=$nama;
        $data['pekerjaan']=$pekerjaan;
        $data['umur']=$umur;
        $data['judul']='About Store';

        $this->view('template/header',$data);
        $this->view('about/index',$data);
        $this->view('template/footer');
    }

}